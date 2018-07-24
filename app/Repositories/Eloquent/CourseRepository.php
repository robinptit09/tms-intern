<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Course;
use App\Interfaces\CourseRepositoryInterface;

/**
 * Class CourseRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CourseRepository extends BaseRepository implements CourseRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Course::class;
    }
}
