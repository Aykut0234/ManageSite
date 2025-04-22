<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminFileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DonatieController;


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
    
// Route om de taal te wijzigen




});



// ✅ Admin-routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
 // Route om logo te uploaden
 // Route voor het wijzigen van de taal
    

 Route::post('/settings/logo/upload', [SettingController::class, 'uploadLogo'])->name('admin.settings.logo.upload');

    // Route om geüploade logo's weer te geven
    Route::get('/settings/logo', [SettingController::class, 'showLogos'])->name('admin.settings.logo');
    // Route om een logo te verwijderen
Route::delete('/admin/settings/logo/delete/{filename}', [SettingController::class, 'deleteLogo'])->name('admin.settings.logo.delete');
Route::get('/gebruikers', [SettingController::class, 'showUsers'])->name('admin.users.list');

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
    Route::get('/json/{name}', [AdminFileController::class, 'editJson'])->name('admin.files.json.edit'); // ✅ VERPLAATST HIER
    Route::post('/files/json/{name}', [AdminFileController::class, 'updateJson'])->name('admin.files.json.update');


});

    });

    Route::prefix('controllers')->group(function () {
        Route::get('/', [AdminFileController::class, 'controllers'])->name('admin.files.controllers');
        Route::get('/edit', [AdminFileController::class, 'editController'])->name('admin.files.controller.edit');
        Route::post('/edit', [AdminFileController::class, 'updateController'])->name('admin.files.controller.update');
        
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
Route::get('/locale/{locale}', [SettingController::class, 'setLanguage'])->name('locale.set');

Route::get('/', fn () => view('dashboard-openbaar'))->name('dashboard.openbaar');
Route::get('/over-ons', fn () => view('overons'))->name('overons');
Route::get('/standpunten', fn () => view('standpunten'))->name('standpunten');
Route::get('/programma', fn () => view('programma'))->name('programma');
Route::get('/nieuws', fn () => view('nieuws'))->name('nieuws');
Route::get('/agenda', fn () => view('agenda'))->name('agenda');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/taal/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ru', 'am', 'nl'])) {
        session(['locale' => $locale]);
    }
    return back(); // blijft op dezelfde pagina
})->name('locale.set');


// ✅ Profielroutes (voor alle ingelogde gebruikers)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/doneren', [DonatieController::class, 'index'])->name('donatie.index');
Route::post('/doneren', [DonatieController::class, 'betalen'])->name('donatie.betalen');
Route::get('/donatie/succes', [DonatieController::class, 'succes'])->name('donatie.succes');
Route::post('/donatie/webhook', [DonatieController::class, 'webhook'])->name('donatie.webhook');


// ✅ Laravel Breeze Auth
require __DIR__.'/auth.php';
