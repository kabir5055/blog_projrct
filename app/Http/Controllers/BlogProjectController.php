<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Session;

class BlogProjectController extends Controller
{
    public function index()
    {
//        $blogs = Blog::where('status',1)
//            ->where('blog_type','popular')
//            ->orderby('id','desc')
//            ->skip(1)
//            ->take(4)
//            ->get();
//        return $blogs;

        $blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','=','categories.id')
            ->join('authors','author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.status',1)
//            ->where('blogs.blog_type','popular')
            ->orderBy('id','desc')
//            ->skip(1)
//            ->take(4)
            ->get();

        return view('frontEnd.home.home',[
            'blogs'=> $blogs,
        ]);
    }
    public function about()
    {
        return view('frontEnd.about.about');
    }
    public function details($slug)
    {
        $blogs = DB::table('blogs')
            ->join('categories','blogs.category_id','=','categories.id')
            ->join('authors','author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.slug',$slug)
//            ->orderBy('id','desc')
//            ->skip(1)
//            ->take(4)
            ->first();

        $catid = $blogs->category_id;
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','=','categories.id')
            ->join('authors','author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('category_id',$catid)
            ->get();

        $comment = DB::table('comments')
            ->join('blog_users','comments.user_id','blog_users.id')
            ->select('comments.*','blog_users.name')
            ->where('comments.blog_id',$blogs->id)
            ->get();

        return view('frontEnd.details.details',[
            'blogs'=> $blogs,
            'categoryWiseBlogs'=> $categoryWiseBlogs,
            'comments' => $comment,
        ]);
    }
    public function category($id)
    {
        $categoryWiseBlogs = DB::table('blogs')
            ->join('categories','blogs.category_id','=','categories.id')
            ->join('authors','author_id','=','authors.id')
            ->select('blogs.*','categories.category_name','authors.author_name')
            ->where('blogs.category_id',$id)
            ->get();

        $category = Category::where('id',$id)->first();

        return view('frontEnd.category.category',[
            'categoryWiseBlogs' => $categoryWiseBlogs,
            'category' => $category,
        ]);
    }
    public function contact()
    {
        return view('frontEnd.contact.contact');
    }

    public function signUp()
    {
        return view('frontEnd.user.user-signUp');
    }
    public function saveSignUp(Request $request)
    {
        BlogUser::saveSignUp($request);
        return view('frontEnd.user.user-signUp');
    }
    public function signIn()
    {
        return view('frontEnd.user.user-signIn');
    }
    public function checkSignIn(Request $request)
    {
        $userInfo = BlogUser::where('email',$request->username)
            ->Orwhere('phone',$request->username)
            ->first();

        if ($userInfo)
        {
            $existingPass = $userInfo->password;
            if (password_verify($request->password,$existingPass))
            {
                Session::put('userId',$userInfo->id);
                Session::put('userName',$userInfo->name);
                return redirect('/');
            }
            else
            {
                return back()->with('massage','Please Use valid User Or Password');
            }

        }
        else
        {
            return back()->with('massage','Please SignUp First');
        }

        return view('frontEnd.user.user-signIn');
    }
    public function signOut()
    {
        Session::forget('userId');
        Session::forget('userName');

        return redirect('/');
    }
}
