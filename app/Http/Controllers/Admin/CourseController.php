<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\Services\CourseService;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    //list
    public function getCourseList()
    {
        $courses = $this->courseService->getCourseList();
        return view('admin.course.list', compact('courses'));
    }

    //edit
    public function getCourseEdit(Request $request)
    {
        $id = $request->id;
        $course = $this->courseService->getCourseEdit($id);
        return view('admin.course.edit', compact('course'));
    }

    public function postCourseEdit(CourseRequest $request, $id)
    {
        $course = $this->courseService->postCourseEdit(['name' => $request->name],$id);
        return redirect()->back()->with('message','Sửa thành công!');
    }

    //add
    public function getCourseAdd()
    {
        return view('admin.course.add');
    }

    public function postCourseAdd(CourseRequest $request)
    {
        $course = $this->courseService->postCourseAdd(['name' => $request->name]);
        return redirect()->back()->with('message','Thêm mới thành công!');
    }

    //delete
    public function getCourseDelete($id)
    {
        $this->courseService->getCourseDelete($id);
        return redirect()->back()->with('message','Xóa thành công!');
    }
}
