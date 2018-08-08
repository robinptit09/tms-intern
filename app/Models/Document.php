<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'document';

    protected $fillable = [
        'name',
        'idCourse',
        'slug',
        'path'
    ];

    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'idCourse', 'id');
    }
}
