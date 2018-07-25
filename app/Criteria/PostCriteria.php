<?php

namespace App\Criteria;

use Illuminate\Http\Request;
use App\Packages\Repository\Contracts\RepositoryInterface;
use App\Packages\Repository\Contracts\CriteriaInterface;

class PostCriteria implements CriteriaInterface
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
        'title',
        'content',
        'created_at',
        'updated_at',
    ];

    protected $mainTable = 'posts';

    /**
     * PostCriteria constructor.
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

        if ($content = array_get($options, 'content')) {
            $model = $model->where($this->mainTable . '.content', 'like', $content);
        }

        $model = $model->select($this->select);

        $mainSortTable = $model->getModel()->getTable();
        $sorting = $repository->setOrder($mainSortTable, $sorting);

        $model = $model->orderBy(array_get($sorting, 'sort'), array_get($sorting, 'order'));


        return $model;
    }
}