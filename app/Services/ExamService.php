<?php

namespace App\Services;

use App\Interfaces\ExamRepositoryInterface as ExamRepository;
use App\Interfaces\CourseRepositoryInterface as CourseRepository;

class ExamService extends BaseService
{
    protected $examRepository;
    protected $courseRepository;

    public function __construct(
        ExamRepository $examRepository,
        CourseRepository $courseRepository
    ){
        $this->examRepository = $examRepository;
        $this->courseRepository = $courseRepository;
    }

    //list
    public function getExamList()
    {
        return $this->examRepository->all();
    }

    //add
    public function getExamAdd()
    {
        return $this->courseRepository->all();
    }

    public function postExamAdd(array $attributes)
    {
        return $this->examRepository->create($attributes);
    }
}