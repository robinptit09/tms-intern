<?php

namespace App\Repositories\Eloquent;

use App\Packages\Repository\Eloquent\BaseRepository;
use App\Models\Document;
use App\Interfaces\DocumentRepositoryInterface;

/**
 * Class DocumentRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DocumentRepository extends BaseRepository implements DocumentRepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }
}
