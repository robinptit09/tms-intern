<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Answer;
use App\Interfaces\AnswerRepositoryInterface;

/**
 * Class AnswerRepositoryEloquent
 * @package namespace App\Repositories;
 */
class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Answer::class;
    }
}
