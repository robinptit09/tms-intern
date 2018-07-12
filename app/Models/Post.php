<?php

namespace App\Models;

class Post extends BaseModel
{
    protected $table = 'posts';

    protected $fillable = [

    ];

    public function account()
    {
        return $this->hasMany('App\Models\Account', 'created_by_admin', 'sid');
    }
}
