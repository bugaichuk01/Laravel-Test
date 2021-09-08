<?php

use App\Http\Controllers\PostsController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::prefix('/news')->group(function () {
    Route::get('/', [PostsController::class, 'index']);
    Route::get('/{category:title}', [PostsController::class, 'showCategory'])->name('show-category');
    Route::get('/{category:title}/{id}-{post:title}.html', [PostsController::class, 'showPost'])->name('show-post');
});

Route::get('/', function () {
    return redirect('/news');
});
