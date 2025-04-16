<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminFileController;

use App\Http\Controllers\ChatController;

use Illuminate\Support\Facades\Route;

// Admin-routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Chat
    Route::get('/chats', [ChatController::class, 'adminChatList'])->name('chat.admin.list');
    Route::get('/chat/{userId}', [ChatController::class, 'adminChat'])->name('chat.admin.view');
    Route::post('/chat/{userId}/send', [ChatController::class, 'sendAdminMessage'])->name('chat.admin.send');

    // ✅ Files
    Route::prefix('files')->group(function () {
        Route::get('/blades', [AdminFileController::class, 'blades'])->name('admin.files.blades');
        Route::get('/blade/edit/{name}', [AdminFileController::class, 'editBlade'])->name('admin.files.blade.edit');
        Route::post('/blade/edit/{name}', [AdminFileController::class, 'updateBlade'])->name('admin.files.blade.update');
        Route::get('/blade/create', [AdminFileController::class, 'createBlade'])->name('admin.files.blade.create');
        Route::post('/blade/create', [AdminFileController::class, 'storeBlade'])->name('admin.files.blade.store');


    });

    Route::prefix('controllers')->group(function () {
        Route::get('/', [AdminFileController::class, 'controllers'])->name('admin.files.controllers');
        Route::get('/edit/{name}', [AdminFileController::class, 'editController'])->name('admin.files.controller.edit');
        Route::post('/edit/{name}', [AdminFileController::class, 'updateController'])->name('admin.files.controller.update');
    });
    
    Route::prefix('special')->group(function () {
        Route::get('/web', [AdminFileController::class, 'webFile'])->name('admin.special.web');
        Route::post('/web', [AdminFileController::class, 'updateWebFile'])->name('admin.special.web.update');

        Route::get('/css', [AdminFileController::class, 'editCss'])->name('admin.files.css');
        Route::post('/css', [AdminFileController::class, 'updateCss'])->name('admin.files.css.update');

        Route::get('/menu', [AdminFileController::class, 'editMenu'])->name('admin.files.menu');
        Route::post('/menu', [AdminFileController::class, 'updateMenu'])->name('admin.files.menu.update');
    });

    Route::get('/pages', function () {
        return view('admin.pages.index');
    })->name('admin.pages.index');
    

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
