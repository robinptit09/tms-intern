<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Interfaces\CourseRepositoryInterface as CourseRepository;

class CourseComposer
{
    /**
     * The user repository implementation.
     *
     * @var CourseRepository
     */
    protected $courseRepository;

    /**
     * Create a new course composer.
     *
     * @param  CourseRepository  $users
     * @return void
     */
    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('courses', $this->courseRepository->all());
    }
}