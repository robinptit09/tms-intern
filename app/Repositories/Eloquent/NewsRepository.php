<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 8/1/2018
 * Time: 9:27 PM
 */

namespace App\Repositories\Eloquent;


use App\Interfaces\NewsRepositoryInterface;
use App\Models\News;
use App\Packages\Repository\Eloquent\BaseRepository;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    public function model()
    {
        return News::class;
    }
}