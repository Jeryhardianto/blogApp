<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
  protected $commentService;
  public function __construct(CommentService $commentService) 
  {
      $this->commentService = $commentService;
  }
    public function store(Request $request)
    {
       
        if($this->commentService->store($request)){
            return redirect()->route('blog.show', $request->slug)->with('success', 'Comment has been added');
        }
    } 
}
