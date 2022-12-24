<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function  index()
    {
        return view('admin.author.author',[
            'authors'=>Author::all(),
        ]);
    }
    public function saveAuthor(Request $request)
    {
        Author::saveAuthor($request);
        return back();
    }
    public function editAuthor($id)
    {
        $author = Author::find($id);
        return view('admin.author.edit',[
           'author' => $author,
        ]);
    }
    public function updateAuthor(Request $request)
    {
        Author::updateAuthor($request);
        return redirect(route('author'));
    }
    public function deleteAuthor(Request $request)
    {
        $author_delete = Author::find($request->author_id);
        $author_delete->delete();
        return back();
    }
}
