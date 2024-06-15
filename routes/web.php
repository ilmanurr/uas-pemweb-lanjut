<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/all', [HomeController::class, 'allPost'])->name('all.posts');
Route::get('/post/{id}', [HomeController::class, 'detailPost'])->name('detail.post');
Route::get('/post/category/{id}', [HomeController::class, 'category'])->name('category.posts');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'pengelola'])->prefix('/pengelola')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboardPengelola'])->name('pengelola.dashboard');
    Route::get('post', [PostController::class, 'show'])->name('pengelola.show.post');
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'pengelola.categories.index',
        'store' => 'pengelola.categories.store',
        'show' => 'pengelola.categories.show',
        'update' => 'pengelola.categories.update',
        'destroy' => 'pengelola.categories.destroy'
    ]);
});

Route::middleware(['auth', 'admin'])->prefix('/admin')->group(function () {
    Route::get('dashboard', [HomeController::class, 'dashboardAdmin'])->name('admin.dashboard');
    Route::resource('post', PostController::class)->names([
        'index' => 'admin.post.index',
        'create' => 'admin.post.create',
        'store' => 'admin.post.store',
        'edit' => 'admin.post.edit',
        'update' => 'admin.post.update',
        'destroy' => 'admin.post.destroy'
    ]);
    Route::resource('categories', CategoryController::class)->names([
        'index' => 'admin.categories.index',
        'store' => 'admin.categories.store',
        'show' => 'admin.categories.show',
        'update' => 'admin.categories.update',
        'destroy' => 'admin.categories.destroy'
    ]);
    Route::resource('users', UserController::class)->names([
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
        'update' => 'admin.users.update',
        'destroy' => 'admin.users.destroy'
    ]);
});