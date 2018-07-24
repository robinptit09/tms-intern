<?php

namespace App\Services;

use App\Interfaces\QuestionRepositoryInterface as QuestionRepository;

class QuestionService extends BaseService
{
    protected $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


}