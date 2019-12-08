<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\AjaxImage;

class FileController extends Controller
{
    public function ajaxFileUploadPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->passes()) {

            $input = $request->all();
            $input['image'] = time() . '.' . $request->image->extension();
            $request->image->move(public_path('files/tmp'), $input['image']);
            
            $file_label = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $request->image->getClientOriginalName() );
            $file_name = $input['image'];

            return response()->json(['success' => 'done','file_label' => $file_label, 'file_name' => $file_name]);
        }


        return response()->json(['error' => $validator->errors()->all()]);
    }

}
