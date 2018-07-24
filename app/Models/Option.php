<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
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
