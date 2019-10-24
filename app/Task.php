<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //

    public $timestamps = true;
    
    protected $table = 'tasks';
    
    protected $primaryKey = 'task_id';
    
    public $incrementing = true;
    
    protected $fillable = ['user_id','title','description', 'duedate'];

    // prtected $guarded = ['task_id']

    public function user()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function task_details()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = mohon_id, localKey = id)
        return $this->hasMany(Task_detail::class, 'task_id', 'task_id');
    }

    public function comments() 
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    
}
