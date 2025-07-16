<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\StatisticsController as AdminStatisticsController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\TypeRoomController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;

use App\Http\Controllers\Api\UserApiController;

// API
Route::apiResource('users', UserApiController::class);

// Public
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/room/{id}', [PageController::class, 'roomDetail'])->name('room.show');
Route::get('/services', [ServiceController::class, 'show']);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('login.process');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Admin
Route::prefix('admin')->name('')->group(function () {
    // Auth
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.process');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Quản lý người dùng
    Route::resource('users', AdminUserController::class)->names('users');

    // Quản lý sản phẩm
    Route::resource('products', AdminProductController::class)->names('products');

    // Quản lý đơn hàng
    Route::resource('orders', AdminOrderController::class)->names('orders');

    // Quản lý danh mục
    Route::resource('categories', AdminCategoryController::class)->names('categories');

    // Quản lý phòng
    Route::resource('rooms', AdminRoomController::class)->names('rooms');

    // Quản lý dịch vụ
    Route::resource('services', AdminServiceController::class)->names('services');

    // Quản lý loại phòng
    Route::resource('type-rooms', TypeRoomController::class)->names('typeRooms');

    // Thống kê
    Route::get('/statistics/revenue', [AdminStatisticsController::class, 'revenue'])->name('statistics.revenue');
    Route::get('/statistics/inventory', [AdminStatisticsController::class, 'inventory'])->name('statistics.inventory');
});


