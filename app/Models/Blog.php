<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public static $blog;
    public static $image;
    public static $imageName;
    public static $directory;
    public static $imgUrl;

    public static function saveBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->slug = self::$blog->makeSlug($request);
        self::$blog->description = $request->description;
        if ($request->file('image'))
        {
            self::$blog->image = self::$blog->saveImage($request);
        }
        self::$blog->date = $request->date;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
        self::$blog->save();
        return redirect(route('manage.blog'));
    }
    public function saveImage($request)
    {
        self::$image = $request->file('image');
        self::$imageName = rand().'.'.self::$image->extension();
        self::$directory = 'admin/upload-image/blog_image/';
        self::$imgUrl = self::$directory.self::$imageName;
        self::$image->move(self::$directory,self::$imageName);

        return self::$imgUrl;
    }
    public function makeSlug($request)
    {
        if($request->slug)
        {
            $str = $request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        else
        {
            $str = $request->title;
            return preg_replace('/\s+/u','-',trim($str));
        }
    }
    public static function updateBlog($request)
    {
        self::$blog = new Blog();
        self::$blog->category_id = $request->category_id;
        self::$blog->author_id = $request->author_id;
        self::$blog->title = $request->title;
        self::$blog->slug = self::$blog->makeSlug($request);
        self::$blog->description = $request->description;
        if ($request->file('image'))
        {
            self::$blog->image = self::$blog->saveImage($request);
        }
        self::$blog->date = $request->date;
        self::$blog->blog_type = $request->blog_type;
        self::$blog->status = $request->status;
        self::$blog->save();
        return redirect(route('manage.blog'));
    }
}
