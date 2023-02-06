<?php

use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class,'index'])->name('home');


//Find a post base on the value given or return error 404
Route::get('posts/{post:slug}', [PostController::class,'show']);


//We will not use this URI because at the end we want to
// be able to use a better filtrarion system that combines
// the auhor, category, etc.
// Route::get('/categories/{category:slug}', function (Category $category) {

//     return view('posts', [
//         'posts' => $category->posts->load(['category','author']),
//         'currentCategory' => $category,
//         'categories' => Category::all()
//     ]);
// });
// Route::get('/authors/{author:username}', function (User $author) {
    
//     return view('posts.index',[
//         'posts' => $author->posts->load(['category','author'])
//         // 'categories' => Category::all()
//     ]);
// });