<?php
/**
 * Post sample
 * @author huyhq6159
 * @date 2017-04-10
 */
namespace App\Services;

use App\Criteria\PostCriteria;
use App\Interfaces\PostRepositoryInterface as PostRepository;

class PostService extends BaseService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return mixed
     */

    public function all($csv = false)
    {
        $this->postRepository->pushCriteria(app(PostCriteria::class));

        if($csv) {
            return $this->postRepository->all();
        }
        return $this->postRepository->paginate(PAGE_SIZE);
    }
}