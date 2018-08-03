<?php
/**
 * Created by PhpStorm.
 * User: 84169
 * Date: 7/31/2018
 * Time: 10:18 PM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        return view('admin.categories.index')->with('categories',Category::all());
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
    // dd($request->all());
        $this->validate($request,[
            'name' => 'required'
        ]);

        Category::create([
           'name' => $request->name
        ]);

        return redirect()->route('categories.index')->with('message','Tạo Danh Mục Thành Công');
    }

    public function edit($id){
        return view('admin.categories.edit')->with('category',Category::find($id));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'required'
        ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')->with('message','Sửa Danh Mục Thành Công');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('message','Xóa Danh Mục Thành Công');
    }
}