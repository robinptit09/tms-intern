<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'idExam',
        'description',
        'type'
    ];

    public function exam()
    {
        return $this->belongsTo('App\Models\Exam', 'idExam', 'id');
    }

    public function option()
    {
        return $this->hasMany('App\Models\Option', 'idQuestion', 'id');
    }

    public function answer()
    {
        return $this->hasMany('App\Models\Answer','idQuestion','id');
    }
}
