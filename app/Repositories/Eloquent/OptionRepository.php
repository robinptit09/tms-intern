<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Option;
use App\Interfaces\OptionRepositoryInterface;

/**
 * Class OptionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class OptionRepository extends BaseRepository implements OptionRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Option::class;
    }
}
