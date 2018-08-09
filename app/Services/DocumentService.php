<?php

namespace App\Services;

use App\Interfaces\DocumentRepositoryInterface as DocumentRepository;
use App\Interfaces\CourseRepositoryInterface as CourseRepository;

class DocumentService extends BaseService
{
    protected $documentRepository;
    protected $courseRepository;

    public function __construct(
        DocumentRepository $documentRepository,
        CourseRepository $courseRepository
    )
    {
        $this->documentRepository = $documentRepository;
        $this->courseRepository = $courseRepository;
    }

    public function documentList()
    {
        return $this->documentRepository->all();
    }

    public function allCourse()
    {
        return $this->courseRepository->all();
    }

    public function addDocument($data)
    {
        $file = $data['file'];
        $name = time().$file->getClientOriginalName();
        $path = "admin_asset/document";
        $file->move($path,$name);
        $attributes = [
            'name' => $data['name'],
            'idCourse' => $data['idCourse'],
            'slug' => str_slug($data['name']),
            'path'=> $name
        ];

        return $this->documentRepository->create($attributes);
    }

    public function findDocument($id)
    {
        return $this->documentRepository->find($id);
    }
}