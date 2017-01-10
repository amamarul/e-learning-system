<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    protected $fillable = [
        'course_id', 'title', 'context', 'description', 'youtube', 'images'
    ];
    public function answer()
    {
        return $this->hasOne('App\Answer');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function given()
    {
        return $this->hasOne('App\GivenAnswer')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc');
    }
}
