<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentDashboardController extends Controller
{
  protected $commentService;
  public function __construct(CommentService $commentService) 
  {
      $this->commentService = $commentService;
  }

  public function show($slug) {
        return view('dashboard.comment.index',[
            'title' => 'Comment Management',
            'slug'  => $slug,
            'comment' => $this->commentService->commentBlogByIdUser($slug)
        ]);
  }

  public function destroy()
  {
    $id = request()->id;
    $slug = request()->slug;
    $this->commentService->deleteCommnet($id);
    return redirect()->route('commnetmanagemnet.show', $slug)->with('success', 'Comment has been deleted');
  }

}
