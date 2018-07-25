<?php

namespace App\Criteria;

use Illuminate\Http\Request;
use App\Packages\Repository\Contracts\RepositoryInterface;
use App\Packages\Repository\Contracts\CriteriaInterface;

class QuestionCriteria implements CriteriaInterface
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
        'id',
        'idExam',
        'description',
        'type',
        'created_at',
        'updated_at',
    ];

    protected $mainTable = 'questions';

    /**
     * QuestionCriteria constructor.
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
        if ($idExam = array_get($options, 'idExam')) {
            $model = $model->where($this->mainTable . '.idExam', '=', $idExam);
        }

        $model = $model->select($this->select);

        $mainSortTable = $model->getModel()->getTable();
        $sorting = $repository->setOrder($mainSortTable, $sorting);

        $model = $model->orderBy(array_get($sorting, 'sort'), array_get($sorting, 'order'));


        return $model;
    }
}