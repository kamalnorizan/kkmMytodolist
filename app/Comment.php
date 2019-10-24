<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    public $timestamps = true;
    
    protected $table = 'comments';
    
    protected $primaryKey = 'id';
    
    public $incrementing = true;
    
    protected $fillable = ['commentable_type','commentable_id','comment_input'];

    public function commentable() 
    {	
    	return $this->morphTo();
    	// return $this->belongsTo('App\Task'::class,'task_id','task_id');
    }

}
