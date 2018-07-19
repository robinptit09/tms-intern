<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Exam;
use App\Interfaces\ExamRepositoryInterface;

/**
 * Class ExamRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ExamRepository extends BaseRepository implements ExamRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Exam::class;
    }
}
