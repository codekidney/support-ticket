<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Ticket extends Model
{
    use Sortable;
    
    protected $fillable = [
        'user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status'  
    ];
    
    public $sortable = [
        'title', 'status', 'category_id', 'priority'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function files(){
        return $this->hasMany(File::class);
    }
}
