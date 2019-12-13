<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\FileService;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer, FileService $fileService){
        $this->validate($request, [
            'comment' => 'required'
        ]);
        
        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
            'comment' => $request->input('comment'),
        ]);
        
        // send mail if the user commenting is not the ticket owner
        if($comment->ticket->user->id !== Auth::user()->id){
            $mailer->sendTicketComments($comment->ticket->user, Auth::user(), $comment->ticket, $comment);
        }
        
        // Files
        if(!empty($request->input('uploaded_files'))) {
            $fileService->ajaxFileUploadSave( $request->input('uploaded_files'), 'comment_id', $comment->id );
        }
        
        return redirect()->back()->with('status', __('tickets.comment_submited') );
    }
}
