<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[BlogProjectController::class,'index'])->name('home');
Route::get('/about',[BlogProjectController::class,'about'])->name('about');
Route::get('/details/{slug}',[BlogProjectController::class,'details'])->name('details');
Route::get('/blog-category/{catId}',[BlogProjectController::class,'category'])->name('blog.category');
Route::get('/contact',[BlogProjectController::class,'contact'])->name('contact');

Route::get('/blog-signUp',[BlogProjectController::class,'signUp'])->name('blog.signUp');
Route::post('/blog-signUp',[BlogProjectController::class,'saveSignUp'])->name('blog.signUp');

Route::get('/blog-signIn',[BlogProjectController::class,'signIn'])->name('blog.signIn');
Route::post('/blog-signIn',[BlogProjectController::class,'checkSignIn'])->name('blog.signIn');
Route::get('/blog-signOut',[BlogProjectController::class,'signOut'])->name('blog.signOut');

Route::post('/new-comment',[CommentController::class,'saveComment'])->name('new.comment');

Route::group(['middleware' => 'blogUser'],function (){
    Route::post('/new-comment',[CommentController::class,'saveComment'])->name('new.comment');
    Route::get('/details/{slug}',[BlogProjectController::class,'details'])->name('details');

});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

//    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');
    Route::get('/edit-category/{id}',[CategoryController::class,'editCategory'])->name('edit.category');
    Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update.category');
    Route::post('/delete-category',[CategoryController::class,'deleteCategory'])->name('delete.category');

    Route::get('/author',[AuthorController::class,'index'])->name('author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new.author');
    Route::get('/edit-author/{id}',[AuthorController::class,'editAuthor'])->name('edit.author');
    Route::post('/update-author',[AuthorController::class,'updateAuthor'])->name('update.author');
    Route::post('/delete-author',[AuthorController::class,'deleteAuthor'])->name('delete.author');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/edit-blog/{id}',[BlogController::class,'editBlog'])->name('edit.blog');
    Route::post('/update-blog',[BlogController::class,'updateBlog'])->name('update.blog');
    Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
    Route::post('/blog-delete',[BlogController::class,'blogDelete'])->name('blog.delete');


});
