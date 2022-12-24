<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.category',[
            'categories'=>Category::all(),
        ]);
    }
    public function saveCategory(Request $request)
    {
        Category::saveCategory($request);
        return back();
    }
    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',[
            'category' => $category,
        ]);
    }
    public function updateCategory(Request $request)
    {
        Category::updateCategory($request);
        return redirect(route('category'));
    }
    public function deleteCategory(Request $request)
    {
        $category_delete = Category::find($request->category_id);
        $category_delete->delete();
        return back();
    }
}
