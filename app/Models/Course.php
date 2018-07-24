<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
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
