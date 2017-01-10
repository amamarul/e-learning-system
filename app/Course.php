<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $fillable = ['title', 'category_id', 'description'];

    public $completed = false;

    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
