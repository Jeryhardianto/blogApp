<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Services\CommentService;

class BlogsController extends Controller
{
    protected $blogService;
    protected $commentService;
    
    public function __construct(BlogService $blogService, CommentService $commentService)
    {
        $this->blogService = $blogService;
        $this->commentService = $commentService;
    }

    public function index()
    {
        
            return view('frontend.index', [
                'blogs' => $this->blogService->getAll()
            ]);
            
        
    }

    public function show($slug)
    {
        return view('frontend.detail',[
            'blogx' => $this->blogService->getBySlug($slug),
            'waktuPost' => $this->blogService->waktuPostBlog($slug),
            'comments'   => $this->commentService->commentBlog($slug)

        ]);
    }

  
}
