<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public $blog;
    public function index()
    {
        return view('admin.blog.add-blog',[
            'categories'=> Category::all(),
            'authors'=> Author::all(),
        ]);
    }
    public function saveBlog(Request $request)
    {
        Blog::saveBlog($request);
        return back();
    }
    public function manageBlog()
    {
        return view('admin.blog.manage-blog',[
            'blogs'=>DB::table('blogs')
            ->join('categories','blogs.category_id','=','categories.id')
            ->join('authors','blogs.author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->get()
        ]);
    }
    public function editBlog($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit',[
            'blog'=>$blog,
            'categories'=> Category::all(),
            'authors'=> Author::all(),
        ]);
    }
    public function updateBlog(Request $request)
    {
        Blog::updateBlog($request);
        return back();
    }
    public function status($id)
    {
        $this->blog = Blog::find($id);
        if ($this->blog->status == 1)
        {
            $this->blog->status = 2;
        }
        else
        {
            $this->blog->status = 1;
        }
        $this->blog->save();
        return redirect(route('manage.blog'));
    }
    public function blogDelete(Request $request)
    {
        $this->blog = Blog::find($request->blog_id);
        if ($this->blog->image)
        {
            if (file_exists($this->blog->image))
            {
                unlink($this->blog->image);
            }
        }
        $this->blog->delete();
        return back();
    }
}
