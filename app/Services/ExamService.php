<?php

namespace App\Services;

use App\Interfaces\ExamRepositoryInterface as ExamRepository;
use App\Interfaces\CourseRepositoryInterface as CourseRepository;
use App\Interfaces\QuestionRepositoryInterface as QuestionRepository;
use App\Interfaces\OptionRepositoryInterface as OptionRepository;
use App\Interfaces\AnswerRepositoryInterface as AnswerRepository;
use App\Criteria\ExamCriteria;

class ExamService extends BaseService
{
    protected $examRepository;
    protected $courseRepository;
    protected $questionRepository;
    protected $optionRepository;
    protected $answerRepository;

    public function __construct(
        ExamRepository $examRepository,
        CourseRepository $courseRepository,
        QuestionRepository $questionRepository,
        OptionRepository $optionRepository,
        AnswerRepository $answerRepository

    )
    {
        $this->examRepository = $examRepository;
        $this->courseRepository = $courseRepository;
        $this->questionRepository = $questionRepository;
        $this->optionRepository = $optionRepository;
        $this->answerRepository = $answerRepository;
    }

    public function listExam()
    {
        $this->examRepository->pushCriteria(app(ExamCriteria::class));

        return $this->examRepository->paginate(10);

    }

    public function allCourse()
    {
        return $this->courseRepository->all();
    }

    public function addExam(array $attributes)
    {
        return $this->examRepository->create($attributes);
    }

    public function findExam($id)
    {
        return $this->examRepository->find($id);
    }

    public function editExam(array $attributes, $id)
    {
        return $this->examRepository->update($attributes, $id);
    }

    public function deleteExam($id)
    {
        return $this->examRepository->delete($id);
    }

    public function addQuestion(array $attributes)
    {
        return $this->questionRepository->create($attributes);
    }

    public function addOption(array $attributes)
    {
        return $this->optionRepository->create($attributes);
    }

    public function findQuestion($id)
    {
        return $this->questionRepository->find($id);
    }

    public function addAnswer(array $attributes)
    {
        return $this->answerRepository->create($attributes);
    }

    public function deleteQuestion($id)
    {
        return $this->questionRepository->delete($id);
    }

    public function editQuestion(array $attributes, $id)
    {
        return $this->questionRepository->update($attributes, $id);
    }

    public function findOption($id)
    {
        return $this->optionRepository->find($id);
    }

    public function editOption(array $attributes, $idOption, $idQuestion)
    {
        if ($this->findOption($idOption) && $this->findOption($idOption)->idQuestion == $idQuestion) {
            return $this->optionRepository->update($attributes, $idOption);
        }
        return $this->optionRepository->create($attributes);
    }

    public function findAnswer($idQuestion)
    {
        return $this->answerRepository->findWhere(['idQuestion' => $idQuestion]);
    }

    public function editAnswer(array $data, $idQuestion)
    {
        $answers = $this->findAnswer($idQuestion);
        foreach ($answers as $ans) {
            $this->answerRepository->delete($ans->id);
        }
        foreach ($data as $value) {
            $opt = [
                'idQuestion' => $idQuestion,
                'answer' => $value,
            ];
            $answer = $this->addAnswer($opt);
        }
        return;
    }

}
