<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AuthController;

// Route::middleware('api')->prefix('api')->group(function () {
//     Route::post('/login', [AuthController::class, 'login']);
//     // Other API routes

//     // Chatroom routes
//     Route::post('/chatrooms', [ChatroomController::class, 'create']); // Create chatroom
//     Route::get('/chatrooms', [ChatroomController::class, 'index']); // List chatrooms
//     Route::post('/chatrooms/{chatroomId}/enter', [ChatroomController::class, 'enter']); // Enter chatroom
//     Route::post('/chatrooms/{chatroomId}/leave', [ChatroomController::class, 'leave']); // Leave chatroom

//     // Message routes
//     Route::post('/chatrooms/{chatroomId}/messages', [MessageController::class, 'send']); // Send message
//     Route::get('/chatrooms/{chatroomId}/messages', [MessageController::class, 'listMessages']); // List messages
// });


// User Authentication Routes
// Route::prefix('api')->group(function () {
//     Route::post('/login', [AuthController::class, 'login']); // Login

//     // Protected Routes
//     Route::middleware('api')->group(function () {
//         // Chatroom routes
//         Route::post('/chatrooms', [ChatroomController::class, 'create']); // Create chatroom
//         Route::get('/chatrooms', [ChatroomController::class, 'index']); // List chatrooms
//         Route::post('/chatrooms/{chatroomId}/enter', [ChatroomController::class, 'enter']); // Enter chatroom
//         Route::post('/chatrooms/{chatroomId}/leave', [ChatroomController::class, 'leave']); // Leave chatroom

//         // Message routes
//         Route::post('/chatrooms/{chatroomId}/messages', [MessageController::class, 'send']); // Send message
//         Route::get('/chatrooms/{chatroomId}/messages', [MessageController::class, 'listMessages']); // List messages
//     });
// });
