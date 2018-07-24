<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
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
