<?php

namespace App\Models;

class Option extends BaseModel
{
    protected $table = 'options';

    protected $fillable = [
        'idQuestion',
        'content'
    ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question', 'idQuestion', 'id');
    }
}
