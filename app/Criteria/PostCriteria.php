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

        $fieldsSearchable = $repository->getFieldsSearchable();

        if ($options && !empty($fieldsSearchable)) {
            $model = $model->where(function ($query) use ($fieldsSearchable, $options, $repository) {
                foreach ($fieldsSearchable as $field => $condition) {
                    $relation = null;

                    $value = $repository->getSearchValue($field, $relation, $condition, $options);

                    $modelTableName = $query->getModel()->getTable();

                    if (!is_null($value)) {
                        if (!is_null($relation)) {
                            $query->whereHas($relation, function ($query) use ($field, $condition, $value) {
                                $query->where($field, $condition, $value);
                            });
                        } else {
                            $query->where($modelTableName . '.' . $field, $condition, $value);
                        }
                    }
                }
            });

            $model = $model->select($this->select);

            $mainSortTable = $model->getModel()->getTable();
            $sorting = $repository->setOrder($mainSortTable, $sorting);

            $model = $model->orderBy(array_get($sorting, 'sort'), array_get($sorting, 'order'));

        }

        return $model;
    }
}