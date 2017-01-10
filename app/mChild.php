<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mChild extends Model
{
    protected $fillable = ['title', 'content', 'parent_id'];
}
