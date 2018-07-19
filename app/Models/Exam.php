<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $table = 'exams';

    protected $fillable = [
        'code',
        'idCourse',
        'numberQuestion',
        'level',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'idCourse', 'id');
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question', 'idExam', 'id');
    }
}
