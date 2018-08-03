<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 8/2/2018
 * Time: 5:05 PM
 */

namespace App\Repositories\Eloquent;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use App\Packages\Repository\Eloquent\BaseRepository;
;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function Model()
    {
        return Category::class;
    }


}