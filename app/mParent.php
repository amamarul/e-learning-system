<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mParent extends Model
{
    public function children()
    {
        return $this->hasMany('App\mChild', 'parent_id');
    }
}
