<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;

use Illuminate\Support\Facades\Route;

// Admin-routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/chats', [ChatController::class, 'adminChatList'])->name('chat.admin.list');
    Route::get('/admin/chat/{userId}', [ChatController::class, 'adminChat'])->name('chat.admin.view');
    Route::post('/admin/chat/{userId}/send', [ChatController::class, 'sendAdminMessage'])->name('chat.admin.send');
});




// Gebruiker-routes
Route::middleware(['auth', 'role:gebruiker'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');
    Route::get('/chat', [ChatController::class, 'userChat'])->name('chat.user');
    Route::post('/chat/send', [ChatController::class, 'sendUserMessage'])->name('chat.user.send');
});


Route::get('/dashboard-openbaar', function () {
    return view('dashboard-openbaar');
})->name('dashboard.openbaar');


























Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
