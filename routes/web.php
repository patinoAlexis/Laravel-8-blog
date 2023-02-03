<?php

use App\Models\Post;
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
    // ddd(Post::all());
    return view('posts',[
        'posts' => Post::all()
    ]);
});



//Find a post base on the value given or return error 404
Route::get('posts/{value}', function ($value) {
    return view('post',[
        'post' => Post::findOrFail($value)
    ]);
})->where('value','[A-z_\-]+');