<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Exam\AddExamRequest;
use App\Http\Requests\Exam\EditExamRequest;
use App\Services\ExamService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Question\AddQuestionRequest;
use Illuminate\Http\Request;
use DB;

class ExamController extends Controller
{
    protected $examService;

    public function __construct(ExamService $examService)
    {
        $this->examService = $examService;
    }

    public function getExamList()
    {
        $exams = $this->examService->allExam();
        return view('admin.exam.list', compact('exams','question'));
    }

    public function getExamAdd()
    {
        $courses = $this->examService->allCourse();
        return view('admin.exam.add', compact('courses'));
    }

    public function postExamAdd(AddExamRequest $request)
    {
        $data = [
            'idCourse' => $request->idCourse,
            'code' => $request->code,
            'level' => $request->level,
            'status' => $request->status
        ];

        $exam = $this->examService->addExam($data);
        return redirect()->back()->with('message','Thêm mới đề thi thành công!');
    }

    public function getExamEdit($id)
    {
        $exam = $this->examService->findExam($id);
        $courses = $this->examService->allCourse();
        return view('admin.exam.edit', compact('exam','courses'));
    }

    public function postExamEdit(EditExamRequest $request,$id)
    {
        $data = [
            'idCourse' => $request->idCourse,
            'code' => $request->code,
            'level' => $request->level,
            'status' => $request->status
        ];

        $exam = $this->examService->editExam($data,$id);
        return redirect()->back()->with('message','Sửa đề thi thành công!');
    }

    public function getExamDelete($id)
    {
        $exam = $this->examService->deleteExam($id);
        return redirect()->back()->with('message','Xóa thành công!');
    }

    public function getExamDetail($id)
    {
        $exam = $this->examService->findExam($id);
        return view('admin.exam.detail', compact('exam'));
    }

    public function getAddQuestion($id)
    {
        $exam = $this->examService->findExam($id);
        return view('admin.exam.addquestion', compact('exam'));
    }

    public function postAddQuestion(AddQuestionRequest $request, $id)
    {
        $data = [
            'idExam' => $id,
            'description' => $request->description,
            'type' => $request->type,
        ];
        $question = $this->examService->addQuestion($data);

        $option = $request->option;

        foreach ($option as $value)
        {
            $opt = [
                'idQuestion' => $question->id,
                'content' => $value,
            ];
            $option[] = $this->examService->addOption($opt);
        }

        return redirect()->route('exam_addAnswer', $question->id );
    }

    public function getAddAnswer($questionId)
    {
        $question = $this->examService->findQuestion($questionId);

        return view('admin.exam.addanswer', compact('question'));
    }

    public function postAddAnswer(Request $request, $questionId)
    {
        if ($request->has('radio_answer'))
        {
            $data = [
                'idQuestion' => $questionId,
                'answer' => $request->radio_answer,
            ];
            $Answer = $this->examService->addAnswer($data);
        } elseif($request->has('checkbox_answer')) {
            foreach($request->checkbox_answer as $value) {
                $dataArray[] = $value;
            }
            $answer = implode('-', $dataArray);
            $data = [
                'idQuestion' => $questionId,
                'answer' => $answer,
            ];
            $Answer = $this->examService->addAnswer($data);
        } else {
            return redirect()->back();
        }
        $question = $this->examService->findQuestion($questionId);
        return redirect()->route('exam_detail',$question->idExam);
    }

    public function getQuestionDelete($id)
    {
        $question = $this->examService->deleteQuestion($id);
        return redirect()->back()->with('message','Xóa thành công!');
    }

    public function getQuestionEdit($id)
    {
        $question = $this->examService->findQuestion($id);
        return view('admin.exam.editquestion', compact('question'));
    }

    public function postQuestionEdit(AddQuestionRequest $request, $id)
    {
        $data = [
            'description' => $request->description,
            'type' => $request->type,
        ];
        $question = $this->examService->editQuestion($data, $id);

        $option = $request->get('option');
        try{
            DB::beginTransaction();

            foreach ($option as $key => $value)
            {
                $opt = [
                    'idQuestion' => $id,
                    'content' => $value,
                ];
                $options[] = $this->examService->editOption($opt, $key, $id);
            }
            DB::commit();
            return redirect()->route('exam_editAnswer', $id );

        }
        catch (\Exception $e)
        {
            DB::rollback();
        }

        return redirect()->route('exam_editAnswer', $id );
    }

    /**
     * @param $questionId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEditAnswer($questionId)
    {
        $question = $this->examService->findQuestion($questionId);

        return view('admin.exam.editanswer', compact('question'));
    }

    public function postEditAnswer(Request $request, $questionId)
    {
        $idAnswer = $request->idAnswer;
        if ($request->has('radio_answer'))
        {
            $data = [
                'idQuestion' => $questionId,
                'answer' => $request->radio_answer,
            ];
            $Answer = $this->examService->editAnswer($data, $idAnswer);
        } elseif($request->has('checkbox_answer')) {
            foreach($request->checkbox_answer as $value) {
                $dataArray[] = $value;
            }
            $answer = implode('-', $dataArray);
            $data = [
                'idQuestion' => $questionId,
                'answer' => $answer,
            ];
            $Answer = $this->examService->editAnswer($data, $idAnswer);
        } else {
            return redirect()->back();
        }
        $question = $this->examService->findQuestion($questionId);
        return redirect()->route('exam_detail',$question->idExam);
    }

}
