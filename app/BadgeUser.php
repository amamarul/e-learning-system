<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BadgeUser extends Model
{
    public $fillable = ['user_id', 'badge_id'];

    public function badge()
    {
        return $this->belongsTo('App\Badge');
    }
}
