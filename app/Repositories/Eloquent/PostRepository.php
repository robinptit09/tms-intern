<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;

/**
 * Class PostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'account.created_by_admin',
        'first_name' => 'like',
        'email' => '=',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    public function aa(){

    }
}
