<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;




Route::get('/', function () {
    return view('home');
});

Route::get('/tempatibadah', function () {
    return view('tempatibadah');
});

Route::get('/tempatmakan', function () {
    return view('tempatmakan');
});

Route::get('/olahraga', function () {
    return view('olahraga');
});

Route::get('/pendidikan', function () {
    return view('pendidikan');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/ibadah', function () {
    return view('dashboard.kategori.ibadah');
});

Route::get('/olahragaa', function () {
    return view('dashboard.kategori.olahragaa');
});

Route::get('/makan', function () {
    return view('dashboard.kategori.makan');
});

Route::get('/pendidikan', function () {
    return view('dashboard.kategori.pendidikan');
});

Route::get('/shop', function () {
    return view('dashboard.kategori.shop');
});

Route::get('/firebase',[FirebaseController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardPostController::class, 'index'])->middleware('auth');

// Route::get('/dashboard/posts', function() {
//     return view ('dashboard.posts.index');
// })->middleware('auth');

Route::get('/dashboard/posts/create', function() {
    return view ('dashboard.posts.create');
})->middleware('auth');

Route::get('/dashboard/posts/{id}', [DashboardPostController::class, 'history'])->middleware('auth');

Route::get('/dashboard/posts/cetak/{id}', [DashboardPostController::class, 'cetak'])->middleware('auth');

Route::post('/dashboard/posts', [DashboardPostController::class, 'store'])->middleware('auth');

Route::get('/kategori/{kategori}', [DashboardPostController::class, 'show'])->name('post.show');

Route::get('/dashboard/kategori/update/{id}', [DashboardPostController::class, 'edit']);

Route::post('/dashboard/kategori/update', [DashboardPostController::class, 'update']);

Route::post('/dashboard/kategori/delete', [DashboardPostController::class, 'destroy']);
