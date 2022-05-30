<?php 
namespace App\Services\Impl;

use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Comment;
use App\Services\BlogService;
use Illuminate\Support\Facades\DB;

class BlogServiceImpl  implements BlogService
{
    // Backend Page
    public function getBlogByIduser($id)
    {
        return Blog::where('id_user', $id)->orderBy('created_at', 'desc')->paginate(10);
    }

    public function saveBlog($data)
    {
        return Blog::create($data);
    }

    public function updateBlog($data)
    {
        // ddd($data->all());
        return Blog::where('id', $data['id'])->update($data);
    }





    // Frontend page
    public function getAll()
    {
        return Blog::with('author')->orderBy('created_at', 'desc')->paginate(10);
    }

    public function getBySlug($slug)
    {
        return Blog::where('slug', $slug)->first();
    }

    public function waktuPostBlog($slug)
    {
        $create_at = DB::select("SELECT created_at FROM blogs WHERE slug = '$slug'");
        $dateTime = $create_at[0]->created_at;
        return Carbon::parse($dateTime)->locale('id')->diffForHumans(['options' => 0]);
    }
    
    public function commentBlog($slug)
    {
        $id_blog = DB::select("SELECT id FROM blogs WHERE slug = '$slug'");
        $id_blog = $id_blog[0]->id;
        return Comment::where('id_blog', $id_blog)->paginate(5);
        
    }
    
 

    



}



?>