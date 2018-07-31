<?php

namespace App\Criteria;

use Illuminate\Http\Request;
use App\Packages\Repository\Contracts\RepositoryInterface;
use App\Packages\Repository\Contracts\CriteriaInterface;

class ExamCriteria implements CriteriaInterface
{

    /**
     * @var Request
     */
    protected $request;

    /**
     * Field list selected
     *
     * @var array
     */
    protected $select = [
        'exams.id',
        'code',
        'idCourse',
        'level',
        'time',
        'status',
        'exams.created_at',
        'exams.updated_at',
    ];

    protected $mainTable = 'exams';

    protected $questionTable = 'questions';

    /**
     * ExamCriteria constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        $options = $this->request->all();

        $sorting = [
            'sort' => $this->request->get('sort'),
            'order' => $this->request->get('order')
        ];
        if ($idCourse = array_get($options, 'ic')) {
            $model = $model->where($this->mainTable . '.idCourse', '=', $idCourse)->where($this->mainTable . '.status','=', 1);
        }
        if($search = array_get($options, 'search')){
            $model = $model->leftJoin($this->questionTable, $this->mainTable.'.id', '=', $this->questionTable.'.idExam')
            ->where($this->questionTable.'.description', 'like', '%'.$search.'%');

    }
        $model = $model->select($this->select);

        $mainSortTable = $model->getModel()->getTable();
        $sorting = $repository->setOrder($mainSortTable, $sorting);

        $model = $model->orderBy(array_get($sorting, 'sort'), array_get($sorting, 'order'));


        return $model;
    }
}