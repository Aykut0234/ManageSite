<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminFileController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ✅ Home route afhankelijk van rol
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->hasRole('gebruiker')) {
            return redirect()->route('user.dashboard');
        }
    }

    return redirect()->route('dashboard.openbaar');
});

// ✅ Admin-routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/settings/logo', [SettingController::class, 'showLogoForm'])->name('admin.settings.logo');
    Route::post('/settings/logo', [SettingController::class, 'uploadLogo'])->name('admin.settings.logo.upload');
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Chat
    Route::get('/chats', [ChatController::class, 'adminChatList'])->name('chat.admin.list');
    Route::get('/chat/{userId}', [ChatController::class, 'adminChat'])->name('chat.admin.view');
    Route::post('/chat/{userId}/send', [ChatController::class, 'sendAdminMessage'])->name('chat.admin.send');

    // ✅ Files
// ✅ Files Routes
Route::prefix('files')->group(function () {
    Route::get('/blades', [AdminFileController::class, 'blades'])->name('admin.files.blades');
    Route::get('/blade/edit', [AdminFileController::class, 'editBlade'])->name('admin.files.blade.edit');
    Route::post('/blade/edit', [AdminFileController::class, 'updateBlade'])->name('admin.files.blade.update');
    
    Route::get('/blade/create', [AdminFileController::class, 'createBlade'])->name('admin.files.blade.create');
    Route::post('/blade/create', [AdminFileController::class, 'storeBlade'])->name('admin.files.blade.store');
    Route::get('/files/essentials', [AdminFileController::class, 'essentials'])->name('admin.files.essentials');
});

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


// ✅ Gebruiker-routes
Route::middleware(['auth', 'role:gebruiker'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('user.dashboard');

    Route::get('/chat', [ChatController::class, 'userChat'])->name('chat.user');
    Route::post('/chat/send', [ChatController::class, 'sendUserMessage'])->name('chat.user.send');
});

// ✅ Openbare pagina’s
Route::get('/home', fn () => view('dashboard-openbaar'))->name('dashboard.openbaar');
Route::get('/over-ons', fn () => view('overons'))->name('overons');
Route::get('/standpunten', fn () => view('standpunten'))->name('standpunten');
Route::get('/programma', fn () => view('programma'))->name('programma');
Route::get('/nieuws', fn () => view('nieuws'))->name('nieuws');
Route::get('/agenda', fn () => view('agenda'))->name('agenda');
Route::get('/contact', fn () => view('contact'))->name('contact');

// ✅ Profielroutes (voor alle ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ✅ Laravel Breeze Auth
require __DIR__.'/auth.php';
