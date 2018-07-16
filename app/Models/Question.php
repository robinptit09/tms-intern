<?php

namespace App\Models;

class Question extends BaseModel
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
        return $this->hasOne('App\Models\Answer','idQuestion','id');
    }
}
