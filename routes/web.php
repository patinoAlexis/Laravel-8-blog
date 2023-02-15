<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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
Route::post('posts/{post:slug}/comments',[PostCommentController::class,'store'])
    ->middleware('auth');


Route::get('register', [RegisterController::class, 'create'])
    ->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])
    ->middleware('guest');


Route::post('logout', [SessionsController::class, 'destroy'])
    ->middleware('auth');


Route::get('login', [SessionsController::class, 'create'])
    ->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])
    ->middleware('guest');


//admin
Route::get('admin/posts',[AdminPostController::class , 'index' ])
    ->middleware('admin');
Route::get('admin/posts/create',[AdminPostController::class , 'create' ])
    ->middleware('admin');
Route::get('admin/posts/{post:id}/edit',[AdminPostController::class , 'edit' ])
    ->middleware('admin');
Route::post('admin/posts',[AdminPostController::class , 'store' ])
    ->middleware('admin');
Route::patch('admin/posts/{post:id}',[AdminPostController::class , 'update' ])
    ->middleware('admin');
//We created an especific middleware for securing that the user is an admin
// but because we have a gate created that also checks is the user is admin, 
// we can use the "can" middleware to check if the user is an admin
// like in the next route
Route::delete('admin/posts/{post:id}',[AdminPostController::class , 'destroy' ])
    ->middleware('can:admin');

/*************** ************* 
If we want to avoid always declaring the same middleware, 
and at the same time avoid repeting routes with the same controller,
we can use also the next function that looks in the controller class
for the 7 basic actions  that all resoursfull controllers have,
************* ************* */
// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts',AdminPostController::class)->except('show');
// })

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