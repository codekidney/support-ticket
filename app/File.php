<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'ticket_id', 'comment_id', 'file_name', 'file_label'
    ];
    
}
