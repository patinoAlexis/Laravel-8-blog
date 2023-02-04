<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Catch_;

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

Route::get('/', function () {
    
    return view('posts',[
        'posts' => Post::latest()->with('category','author')->get()
    ]);
});


//Find a post base on the value given or return error 404
Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        // 'post' => Post::findOrFail($post)
        'post' => $post
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {

    return view('posts', [
        'posts' => $category->posts->load(['category','author'])
    ]);
});
Route::get('/authors/{author:username}', function (User $author) {
    
    return view('posts',[
        'posts' => $author->posts->load(['category','author'])
    ]);
});