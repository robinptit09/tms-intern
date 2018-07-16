<?php

namespace App\Models;

class Exam extends BaseModel
{
    protected $table = 'exams';

    protected $fillable = [
        'code',
        'idCourse'
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
