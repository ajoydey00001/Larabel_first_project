<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome',['posts' => Post::paginate(3)]);
})->name('home');

// Route::get('/create', function () {
//     return view('create');
// });
Route::get('/create',[PostController::class, 'create']);
// Route::get('/create',[PostController::class, 'create']);
Route::post('/store',[PostController::class, 'ourfilestore']) ->name('store');
Route::post('/update/{id}',[PostController::class, 'updateData']) ->name('update');
Route::get('/delete/{id}',[PostController::class, 'deleteData']) ->name('delete');

Route::get('/edit/{id}', [PostController::class, 'editData'])->name('edit');

