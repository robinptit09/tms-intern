<?php

namespace App\Models;

class Course extends BaseModel
{
    protected $table = 'course';

    protected $fillable = [
        'name'
    ];

    public function exam()
    {
        return $this->hasMany('App\Models\Exam', 'idCourse', 'id');
    }
}
