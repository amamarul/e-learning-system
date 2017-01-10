<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['title'];

    public function courses()
    {
        return $this->hasMany('App\Course')->orderBy('id', 'desc');
    }
}
