<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticleController;
use App\Models\Comment;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/dashboard', [PostsController::class, 'index'])
        ->name('dashboard');

    Route::get('/admin/new', [PostsController::class, 'create'])
        ->name('new');

    Route::post('/admin/new', [PostsController::class, 'store']);

    Route::patch('/admin/{posts:slug}/updated', [PostsController::class, 'update']);

    Route::get('/admin/{posts:slug}/edit', [PostsController::class, 'edit']);

    Route::get('/admin/{posts:slug}/delete', [PostsController::class, 'delete'])
        ->name('delete');
    
    Route::get('/p/{comment:id}/delete', [ArticleController::class, 'destroy']);
});

Route::get('/', [ArticleController::class, 'index'])
        ->name('index');

    // post comment route
Route::post('/p/{slug}', [ArticleController::class, 'store']);

    // post return view
Route::get('/p/{posts:slug}', [ArticleController::class, 'show']);


require __DIR__ . '/auth.php';