<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public static $author;
    public static function saveAuthor($request)
    {
        self::$author = new Author();
        self::$author->author_name = $request->author_name;
        self::$author->save();
    }
    public static function updateAuthor($request)
    {
        self::$author = Author::find($request->author_id);
        self::$author->author_name = $request->author_name;
        self::$author->save();
    }
}
