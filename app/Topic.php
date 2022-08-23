<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $table      = 'topics';
    protected $primaryKey = 'id';
    protected $fillable   = ['course_id', 'chapter_id', 'topic_name', 'sub_heading', 'topic_type', 'status'];

    public function courses()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function chapters()
    {
        return $this->belongsTo('App\Chapter','chapter_id');
    }

    
}
