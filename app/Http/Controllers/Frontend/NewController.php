<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 8/8/2018
 * Time: 11:32 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Services\CategoryService;
class NewController extends Controller
{
    protected $newsService;
    protected $categoryService;
    public function __construct(
        NewsService $newsService,
        CategoryService $categoryService
    )
    {
        $this->newsService = $newsService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
       // $categories = $this->categoryService->getCategory();
        $news = $this->newsService->getList();
        return view('frontend.new.news')->with('news',$news );
    }

}