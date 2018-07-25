<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\ActionUsers;
use App\Interfaces\ActionUsersRepositoryInterface;

/**
 * Class ActionUsersRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ActionUsersRepository extends BaseRepository implements ActionUsersRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ActionUsers::class;
    }
}
