<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_detail extends Model
{
    
    public $timestamps = true;
    
    protected $table = 'task_details';
    
    protected $primaryKey = 'task_detail_id';
    
    public $incrementing = true;
    
    protected $fillable = ['title','task_id','status'];

    public function task()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(Task::class, 'task_id', 'task_id');
    }

    public function comments() 
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
