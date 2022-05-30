<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Blogs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\BlogService;
use Illuminate\Support\Facades\Auth;

class BlogPostDashboardController extends Controller
{
 
    protected $blogService;
    
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
       return view( 'dashboard.postblog.index', [
           'title' => "Post Blog",
           'blogByUser' => $this->blogService->getBlogByIduser(Auth::user()->id),
       ]);
    }

    public function create()
    {
       return view( 'dashboard.postblog.create', [
           'title' => "Add Post Blog"
       ]);

    }


    public function store(Request $request)
    {
        //Validate the request
        $data = $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);
        if($request->file('image')){
           $data['image'] = $request->file('image')->store('blog-image');
        }
        $data['id_user'] = Auth::user()->id;
        $data['slug'] = Str::slug($data['title']) . '-' . time();
        $data['excerpt'] = Str::limit(strip_tags($request->body), 200);
 
        $this->blogService->saveBlog($data);
        return redirect()->route('blogpost.index', $request->slug)->with('success', 'Blog has been added');
    }

    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        return view(
            'dashboard.postblog.edit',
            [
                'title' => "Edit Post Blog",
                'blog' => $this->blogService->getBySlug($id),
            ]
        );
    }

  
    public function update(Request $request)
    {
                //Validate the request
                $data = $request->validate([
                    'title' => 'required|max:255',
                    'body'  => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg|max:1024',
                ]);
                if($request->file('image')){
                   $data['image'] = $request->file('image')->store('blog-image');
                }
                
                $data['id'] = $request->id;
                $data['slug'] = Str::slug($data['title']) . '-' . time();
                $data['excerpt'] = Str::limit(strip_tags($request->body), 200);

                $this->blogService->updateBlog($data);
                return redirect()->route('blogpost.index', $request->slug)->with('success', 'Blog has been updated');
    }

  
    public function destroy(Request $request)
    {
        Blog::destroy($request->id);
        return redirect()->route('blogpost.index')->with('success', 'Blog has been deleted');
    }
   
}
