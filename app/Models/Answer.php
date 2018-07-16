<?php

namespace App\Models;

class Answer extends BaseModel
{
    protected $table = 'answer';

    protected $fillable = [
        'idQuestion',
        'answer'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'idQuestion', 'id');
    }
}
