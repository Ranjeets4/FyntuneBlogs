<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog as BlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs=Blog::with(['user','category'])->latest()->paginate(2);
        $categories=Category::get();
        $data=compact('blogs','categories');
        return view('index', $data);
    }

    public function showBlogDetails($id)
    {
        $blog=Blog::where(['id'=>$id])->with(['user','category'])->first();
        $categories=Category::get();
        $data=compact('blog','categories');
        return view('blog-details', $data);
    }

    public function showBlogs()
    {
        $blogs=Blog::where(['user_id'=>Auth::user()->id])->with(['category'])->latest()->paginate(2);
        
        $data=compact('blogs');
        return view('show-blogs', $data);
    }

    public function addBlogs($id=false)
    {
        if($id!='')
        {
            $blog=Blog::where(['id'=>$id])->first();
            $categories=Category::get();
            $data=compact('categories', 'blog');
            return view('update-blog', $data);
        }
        else{
            $categories=Category::get();
            $data=compact('categories');
            return view('create-blog', $data);
        }
        
        
    }

    public function createBlogs(BlogRequest $request)
    {
        
        $blog=new Blog();
        $blog->title=$request['title'];
        $blog->description=$request['description'];
        $blog->user_id=Auth::user()->id;
        $blog->category_id=$request['category'];
        
        $path = $request->file('image')->store(
            'images'
        );
        $blog->image=$path;
        $blog->save();
        $blogCreated=true;
        
        $categories=Category::get();
        $data=compact('blogCreated', 'categories');
        
        return view('create-blog', $data);
        
    }

    public function updateBlog(BlogRequest $request, $id)
    {
        
        $blog=Blog::where(['title'=>$request['title'],'id'=>$id])->first();
        
        $blog->title=$request['title'];
        $blog->description=$request['description'];
        
        $blog->category_id=$request['category'];
        
        $path = $request->file('image')->store(
            'images'
        );
        $blog->image=$path;
        $blog->save();
        $blogUpdates=true;
        
        $categories=Category::get();
        $data=compact('blogUpdates', 'categories','blog');
        
        return view('update-blog', $data);
    }

    public function categoryBlogs($id)
    {
        $blogs=Blog::where(['category_id'=>$id])->paginate(8);
        $categories=Category::get();
        $data=compact('blogs','categories');
        return view('index', $data);
    }
    public function deleteBlog($id)
    {
        Blog::where(['id'=>$id])->delete();
        return redirect('/show-blogs');
    }
    
}
