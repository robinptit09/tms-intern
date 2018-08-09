<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 7/31/2018
 * Time: 5:23 PM
 */

namespace App\Http\Controllers\Admin;

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
        $news = $this->newsService->getList();
        return view('admin.news.listNews')->with('news',$news);
    }
//    public function create(){
//        $categories = Category::all();
//        return view('admin.news.create')->with('categories',$categories);
//    }
    public function create()
    {

        $categories = $this->categoryService->getCategory();
        return view('admin.news.create',['categories' =>$categories]);
    }

    public function store(Request $request)
    {
     // dd($request);
        $this->newsService->addNews($request);
        return redirect()->back()->with('mes','thêm mới thành công');
    }
    public function editNews(Request $request)
    {
        $categories = $this->categoryService->getCategory();
        $id = $request->id;
        $news = $this->newsService->editNews($id);
        return view('admin.news.edit',['categories' =>$categories], compact('news'));

    }
    public function updateNews(Request $request, $id )
    {
        //dd($request);
        $news = $this->newsService->postEditNews([

            'title'  => $request->get('title'),
            'category_id' => $request->category_id,
            'content'  => $request->get('content')
        ],$id);
        return redirect()->back()->with('message','Sửa thành công!');

    }



    public function deleteNews($id)
    {
        $this->newsService->deleteNews($id);
        return redirect()->back()->with('message','Xóa thành công!');

    }


}