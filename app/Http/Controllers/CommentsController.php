<?php

namespace App\Http\Controllers;

use App\Comment;
use App\File as FileModel;
use App\Mailers\AppMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer){
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
        $files = explode( '|', $request->input('uploaded_files') );
        if( count($files) > 0) {
            foreach($files as $fProp){
                $fPropArr = explode(',', $fProp);
                $file_label = $fPropArr[1];
                $file_name = $fPropArr[0];
                $file = FileModel::create([
                    'comment_id' => $comment->id,
                    'file_name'  => $file_name,
                    'file_label' => $file_label,
                ]);
                
                $tmp_file_path = 'tmp/'.$file_name;
                $new_file_path = $file_name;
                Storage::disk('files')->move($tmp_file_path, $new_file_path);
            }
        }
        
        return redirect()->back()->with('status', 'Your comment has be submited');
    }
}
