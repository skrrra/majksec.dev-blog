<?php

use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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
    return view('welcome');
})->name('index');

Route::get('/admin/dashboard', [PostsController::class, 'index'])
            ->middleware(['auth'])
            ->name('dashboard');

Route::get('/admin/new', [PostsController::class, 'create'])
            ->middleware(['auth'])
            ->name('new');

Route::post('/admin/new', [PostsController::class, 'store'])
            ->middleware(['auth']);

Route::patch('/admin/{post}/updated', [PostsController::class, 'update'])
            ->middleware(['auth']);

Route::get('/admin/{slug}/edit', [PostsController::class, 'edit'])
            ->middleware(['auth']);

Route::get('/admin/{post:slug}/delete', [PostsController::class, 'delete'])
            ->middleware(['auth'])
            ->name('delete');

require __DIR__.'/auth.php';
