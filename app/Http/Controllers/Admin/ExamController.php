<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ExamRequest;
use Illuminate\Http\Request;
use App\Services\ExamService;
use App\Http\Controllers\Controller;


class ExamController extends Controller
{
    protected $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    public function getExamList()
    {
        $exams = $this->examService->getExamList();
        return view('admin.exam.list', compact('exams'));
    }

    public function getExamAdd()
    {
        $courses = $this->examService->getExamAdd();
        return view('admin.exam.add', compact('courses'));
    }

    public function postExamAdd(ExamRequest $request)
    {
        $data = [
            'idCourse' => $request->idCourse,
            'code' => $request->code,
            'numberQuestion'=> $request->numberQuestion,
            'level' => $request->level,
            'status' => $request->status
        ];

        $exam = $this->examService->postExamAdd($data);
        return redirect()->back()->with('message','Thêm mới đề thi thành công!');
    }


}
