<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'context',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
