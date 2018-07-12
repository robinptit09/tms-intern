<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show (Request $request)
    {
        $posts = $this->postService->all();
        return response()->json($posts);
        //return view('post.show', compact('posts'));
    }

}
