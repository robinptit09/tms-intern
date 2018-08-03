<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActionUsers extends Model
{
    protected $table = 'actionusers';

    protected $fillable = [
        'idUser',
        'idExam',
        'point'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'idUser', 'id');
    }

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'idExam', 'id');
    }
}
