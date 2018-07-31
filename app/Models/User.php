<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable =
        [
             'id',
             'email',
            'password',
            'first_name',
            'last_name'


        ];

}
