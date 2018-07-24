<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Question;
use App\Interfaces\QuestionRepositoryInterface;

/**
 * Class QuestionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Question::class;
    }
}
