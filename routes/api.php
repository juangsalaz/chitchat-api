<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->group(function () {
    // Chatroom routes
    Route::post('/chatrooms', [ChatroomController::class, 'create']);
    Route::get('/chatrooms', [ChatroomController::class, 'index']);
    Route::post('/chatrooms/{chatroomId}/enter', [ChatroomController::class, 'enter']);
    Route::post('/chatrooms/{chatroomId}/leave', [ChatroomController::class, 'leave']);

    // Message routes
    Route::post('/chatrooms/{chatroomId}/messages', [MessageController::class, 'send']);
    Route::get('/chatrooms/{chatroomId}/messages', [MessageController::class, 'listMessages']);
});
