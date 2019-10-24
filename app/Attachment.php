<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    //

    public $timestamps = true;
    
    protected $table = 'attachments';
    
    protected $primaryKey = 'attachment_id';
    
    public $incrementing = true;
    
    protected $fillable = ['task_detail_id','url'];
}
