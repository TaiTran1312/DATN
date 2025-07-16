<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Api\RoomApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ServiceApiController;
use App\Http\Controllers\Api\RoomTypeApiController;
use App\Http\Controllers\Api\CommentApiController;
use App\Http\Controllers\Api\BookingApiController;
use App\Http\Controllers\Api\PostApiController;
use App\Http\Controllers\Api\NotificationApiController;
use App\Http\Controllers\Api\ContactApiController;
use App\Http\Controllers\Api\ReviewApiController;
use App\Http\Controllers\Api\OrderApiController;

// Admin API
Route::prefix('v1')->group(function () {
    Route::get('rooms', [RoomApiController::class, 'index']);
    Route::get('rooms/{id}', [RoomApiController::class, 'show']);

    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);

    Route::get('services', [ServiceApiController::class, 'index']);
    Route::get('/services/{id}', [ServiceApiController::class, 'show']);
    Route::post('/services', [ServiceApiController::class, 'store']);
    Route::delete('/services/{id}', [ServiceApiController::class, 'destroy']);
    Route::put('/services/{id}', [ServiceApiController::class, 'update']);

    Route::get('/rooms/{id}', [RoomApiController::class, 'show']);
    Route::put('/rooms/{id}', [RoomApiController::class, 'update']);

    Route::get('/room-types', [RoomTypeApiController::class, 'index']);
    Route::get('/room-types/{id}', [RoomTypeApiController::class, 'show']);
    Route::post('/room-types', [RoomTypeApiController::class, 'store']);
    Route::delete('/room-types/{id}', [RoomTypeApiController::class, 'destroy']);
    Route::put('/room-types/{id}', [RoomTypeApiController::class, 'update']);

    Route::get('/comments', [CommentApiController::class, 'index']);
    Route::get('/comments/{id}', [CommentApiController::class, 'show']);
    Route::post('/comments', [CommentApiController::class, 'store']);
    Route::put('/comments/{id}', [CommentApiController::class, 'update']);
    Route::delete('/comments/{id}', [CommentApiController::class, 'destroy']);

    Route::get('/bookings', [BookingApiController::class, 'index']);
    Route::get('/bookings/{id}', [BookingApiController::class, 'show']);
    Route::post('/bookings', [BookingApiController::class, 'store']);
    Route::put('/bookings/{id}', [BookingApiController::class, 'update']);
    Route::delete('/bookings/{id}', [BookingApiController::class, 'destroy']);

    Route::get('/posts', [PostApiController::class, 'index']);
    Route::get('/posts/{id}', [PostApiController::class, 'show']);
    Route::post('/posts', [PostApiController::class, 'store']);
    Route::put('/posts/{id}', [PostApiController::class, 'update']);
    Route::delete('/posts/{id}', [PostApiController::class, 'destroy']);

    Route::get('/notifications', [NotificationApiController::class, 'index']);
    Route::get('/notifications/{id}', [NotificationApiController::class, 'show']);
    Route::post('/notifications', [NotificationApiController::class, 'store']);
    Route::put('/notifications/{id}', [NotificationApiController::class, 'update']);
    Route::delete('/notifications/{id}', [NotificationApiController::class, 'destroy']);

    Route::get('/contacts', [ContactApiController::class, 'index']);
    Route::post('/contacts', [ContactApiController::class, 'store']);
    Route::put('/contacts/{id}', [ContactApiController::class, 'update']);
    Route::get('/contacts/{id}', [ContactApiController::class, 'show']);
    Route::delete('/contacts/{id}', [ContactApiController::class, 'destroy']);

    Route::get('/reviews', [ReviewApiController::class, 'index']);
    Route::get('/reviews/{id}', [ReviewApiController::class, 'show']);
    Route::post('/reviews', [ReviewApiController::class, 'store']);
    Route::put('/reviews/{id}', [ReviewApiController::class, 'update']);
    Route::delete('/reviews/{id}', [ReviewApiController::class, 'destroy']);

    Route::get('/orders', [OrderApiController::class, 'index']);
    Route::get('/orders/{id}', [OrderApiController::class, 'show']);
    Route::post('/orders', [OrderApiController::class, 'store']);
    Route::put('/orders/{id}', [OrderApiController::class, 'update']);
    Route::delete('/orders/{id}', [OrderApiController::class, 'destroy']);

    Route::get('/users/{id}/orders', [OrderApiController::class, 'getOrdersByUser']);
    Route::get('/orders/{id}/details', [OrderApiController::class, 'getOrderDetails']);
    Route::post('/orders/{id}/details', [OrderApiController::class, 'addOrderDetail']);
    Route::put('/orders/{id}/details/{detailId}', [OrderApiController::class, 'updateOrderDetail']);
    Route::delete('/orders/{id}/details/{detailId}', [OrderApiController::class, 'deleteOrderDetail']);
    
});


// API Routes
Route::prefix('v1')->middleware('api')->group(function () {
    // Public
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/login',    [AuthController::class, 'login']);

    // Protected
    // Route::middleware('auth:sanctum')->group(function () {
    //     Route::post('auth/logout', [AuthController::class, 'logout']);
    //     Route::get('user', fn (Request $request) => $request->user());

    //     Route::get('rooms',      [RoomApiController::class, 'index']);
    //     Route::get('rooms/{id}', [RoomApiController::class, 'show']);
    // });

    // Admin API
    Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
        Route::apiResource('users', UserApiController::class)->names('admin.api.users');
        Route::apiResource('room-types', RoomTypeApiController::class)->names('admin.api.room-types');
        Route::apiResource('rooms', RoomApiController::class)->names('admin.api.rooms');
        Route::apiResource('services', ServiceApiController::class);
        Route::apiResource('posts', PostApiController::class)->names('admin.api.posts');
        Route::apiResource('bookings', BookingApiController::class)->names('admin.api.bookings');
        Route::apiResource('notifications', NotificationApiController::class)->names('admin.api.notifications');
        Route::apiResource('comments', CommentApiController::class)->names('admin.api.comments');
        Route::apiResource('contacts', ContactApiController::class)->names('admin.api.contacts');
        Route::apiResource('reviews', ReviewApiController::class)->names('admin.api.reviews');
        Route::apiResource('orders', OrderApiController::class)->names('admin.api.orders');
    });
});

