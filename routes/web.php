<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

// Admin namespace
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Frontend (User) Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/suggested', [NewsController::class, 'suggested'])->name('news.suggested');
Route::get('/latest', [NewsController::class, 'latest'])->name('news.latest');
Route::get('/popular', [NewsController::class, 'mostViewed'])->name('news.popular');

/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::post('/news/{slug}/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/edit', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
});

/*
|--------------------------------------------------------------------------
| Dashboard & Profile (auth + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'userDashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin (Backend) Routes - Protected by role:admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', AdminMiddleware::class])

    ->name('admin.')
    ->group(function () {
        // Trang chính chuyển hướng đến dashboard
        Route::get('/', fn() => redirect()->route('admin.dashboard'));

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Quản lý danh mục
        Route::resource('categories', AdminCategoryController::class);

        // Quản lý tin tức
        Route::resource('news', AdminNewsController::class);

        // Quản lý người dùng
        Route::resource('users', AdminUserController::class)
            ->only(['index', 'edit', 'update', 'destroy', 'create', 'store']);

        // Quản lý bình luận
        Route::resource('comments', AdminCommentController::class)
            ->only(['index', 'store', 'edit', 'update', 'destroy']);
    });

/*
|--------------------------------------------------------------------------
| Auth Routes (Login, Register, etc)
|--------------------------------------------------------------------------
*/
Route::feeds(); // Tạo route RSS nếu có dùng Laravel Feed
require __DIR__.'/auth.php';
