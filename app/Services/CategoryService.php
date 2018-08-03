<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 8/2/2018
 * Time: 5:02 PM
 */

namespace App\Services;
use App\Interfaces\CategoryRepositoryInterface;

use Illuminate\Http\Request;

class CategoryService extends BaseService
{
    protected $categoryRepository;
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
   public function getCategory()
   {
       return $this->categoryRepository->all();

   }



}