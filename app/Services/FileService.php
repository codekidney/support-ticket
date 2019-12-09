<?php

namespace App\Services;

use App\File as FileModel;
use Illuminate\Support\Facades\Storage;

class FileService {
    
    public function __construct() {
        
    }
    
    private function saveFile(string $fileName) {
        $tmp_file_path = 'tmp/'.$fileName;
        $new_file_path = $fileName;
        Storage::disk('files')->move($tmp_file_path, $new_file_path);
    }


    public function ajaxFileUploadSave(string $inputVal, string $parent_column, int $parent_id){
        $files = explode( '|', $inputVal );
        if( count($files) > 0) {
            foreach($files as $fProp){
                $fPropArr = explode(',', $fProp);
                $file_label = $fPropArr[1];
                $fileName = $fPropArr[0];
                
                // Save Entry
                FileModel::create([
                    $parent_column => $parent_id,
                    'file_name'    => $fileName,
                    'file_label'   => $file_label,
                ]);
                
                // Save File
                $this->saveFile($fileName);
            }
        }
        return true;
    }
}
