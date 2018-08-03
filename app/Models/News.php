<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 8/2/2018
 * Time: 3:01 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'category_id',
        'title',
        'content'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}