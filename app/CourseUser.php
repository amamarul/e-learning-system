<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    protected $fillable = ['course_id', 'user_id'];
    protected $table = 'course_user';


    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function getCategoryTitle()
    {
        return $this->course->category->title;
    }

    public function getCourseName()
    {
        return $this->course->title;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
