<?php 
namespace App\Services\Impl;

use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Support\Facades\DB;

class CommentServiceImpl  implements CommentService
{
    // Backend Route
    public function commentBlogByIdUser($slug)
    {
        $id_blog = DB::select("SELECT id FROM blogs WHERE slug = '$slug'");
        $id_blog = $id_blog[0]->id;
        return Comment::where('id_blog', $id_blog)->orderBy('id', 'desc')->paginate(10);
    }
    
    public function deleteCommnet($id)
    {
        $comment = Comment::find($id);
        $comment->delete();      
    }

    //    Frontend Route
    public function commentBlog($slug)
    {
        $id_blog = DB::select("SELECT id FROM blogs WHERE slug = '$slug'");
        $id_blog = $id_blog[0]->id;
        return Comment::where('id_blog', $id_blog)->orderBy('id', 'desc')->paginate(5);
    }

    public function store($data)
    {
        $validate = $data->validate([
            'id_blog' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        return Comment::create($validate);
    }
    
 

    



}



?>