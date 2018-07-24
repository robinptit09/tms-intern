<?php

namespace App\Services;

use App\Interfaces\CourseRepositoryInterface as CourseRepository;

class CourseService extends BaseService
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    //list
    public function getCourseList()
    {
        return $this->courseRepository->all();
    }

    //edit
    public function getCourseEdit($id)
    {
        return $this->courseRepository->find($id);
    }

    public function postCourseEdit(array $attributes ,$id)
    {
        return $this->courseRepository->update($attributes ,$id);
    }

    //add
    public function postCourseAdd(array $attributes)
    {
        return $this->courseRepository->create($attributes);
    }

    //delete
    public function getCourseDelete($id)
    {
        return $this->courseRepository->delete($id);
    }
}