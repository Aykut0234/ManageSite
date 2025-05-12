<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminFileController extends Controller
{
    // Toon lijst van alle blade-bestanden
    public function blades()
    {
        $bladeFiles = collect(File::allFiles(resource_path('views')))
            ->filter(fn($file) => str_ends_with($file->getFilename(), '.blade.php'))
            ->map(fn($file) => [
                'name' => $file->getRelativePathname(),
                'path' => $file->getRealPath(),
            ]);

        return view('admin.files.blades', compact('bladeFiles'));
    }

    // Bewerk een specifiek blade-bestand
    public function editBlade(Request $request)
    {
        $name = urldecode($request->query('name'));
        $fullPath = resource_path('views/' . $name);
    
        if (!file_exists($fullPath)) {
            abort(404, 'Bestand niet gevonden');
        }
    
        $content = File::get($fullPath);
    
        return view('admin.files.edit_blade', [
            'name' => $name,
            'content' => $content,
        ]);
    }
    // Opslaan van wijzigingen in blade
    public function updateBlade(Request $request)
{
    $validated = $request->validate([
        'old_name' => 'required|string',
        'new_name' => 'required|string',
        'content' => 'required|string',
    ]);

    $oldPath = resource_path('views/' . $validated['old_name']);
    $newPath = resource_path('views/' . $validated['new_name']);

    if (!File::exists($oldPath)) {
        abort(404, 'Oud bestand niet gevonden.');
    }

    // Als de naam veranderd is, hernoem het bestand
    if ($validated['old_name'] !== $validated['new_name']) {
        $newDir = dirname($newPath);
        if (!File::exists($newDir)) {
            File::makeDirectory($newDir, 0755, true);
        }
        rename($oldPath, $newPath);
    }

    // Schrijf de inhoud naar het nieuwe pad
    File::put($newPath, $validated['content']);

    return redirect()->route('admin.files.blades')->with('success', 'Bestand bijgewerkt.');
}

    // Formulier voor nieuw blade-bestand
public function createBlade()
{
    return view('admin.files.create_blade');
}

// Opslaan van nieuw bestand
public function storeBlade(Request $request)
{
    $validated = $request->validate([
        'folder' => 'nullable|string|regex:/^[a-zA-Z0-9_\-\/]*$/',
        'filename' => 'required|string|regex:/^[a-zA-Z0-9_\-]+$/',
        'content' => 'nullable|string',
    ]);

    $folder = trim($validated['folder'] ?? '');
    $filename = trim($validated['filename']);
    $fullRelativePath = ($folder ? $folder . '/' : '') . $filename . '.blade.php';

    $fullPath = resource_path('views/' . $fullRelativePath);

    // Maak map aan indien nodig
    $directory = dirname($fullPath);
    if (!File::exists($directory)) {
        File::makeDirectory($directory, 0755, true);
    }

    // Bestaat al?
    if (file_exists($fullPath)) {
        return back()->withErrors(['filename' => 'Bestand bestaat al!']);
    }

    File::put($fullPath, $validated['content'] ?? '');

    return redirect()->route('admin.files.blades')
    ->with('success', 'Nieuw bestand aangemaakt.');
}


// Toon lijst met controllers
public function controllers()
{
    $files = collect(File::allFiles(app_path('Http/Controllers')))
        ->filter(fn($file) => str_ends_with($file->getFilename(), '.php'));

    return view('admin.files.controllers', compact('files'));
}

// Bewerk specifieke controller
public function editController(Request $request)
{
    $name = urldecode($request->query('name'));
    $fullPath = app_path('Http/Controllers/' . $name);

    if (!file_exists($fullPath)) {
        abort(404, 'Controller niet gevonden');
    }

    $content = File::get($fullPath);

    return view('admin.files.edit_controller', compact('name', 'content'));
}

public function updateController(Request $request)
{
    $name = urldecode($request->query('name'));
    $path = app_path('Http/Controllers/' . $name);

    if (!file_exists($path)) {
        abort(404, 'Controller niet gevonden');
    }

    File::put($path, $request->input('content'));

    return back()->with('success', 'Controller succesvol opgeslagen.');
}


// ✅ Bewerken van web.php
public function webFile()
{
    $path = base_path('routes/web.php');

    if (!file_exists($path)) {
        abort(404, 'web.php niet gevonden');
    }

    $raw = File::get($path);

    return view('admin.files.edit_single', [
        'name' => 'web.php',
        'route' => route('admin.special.web.update'),
        'content' => e($raw), // 👈 belangrijk: ontsnap HTML-gevoelige tekens
    ]);
}


public function updateWebFile(Request $request)
{
    $path = base_path('routes/web.php');

    if (!file_exists($path)) {
        abort(404, 'web.php niet gevonden');
    }

    File::put($path, $request->input('content'));

    return back()->with('success', 'web.php opgeslagen!');
}


// ✅ Bewerken van style.css
public function editCss() {
    // Gebruik public_path voor toegang tot bestanden in de public directory
    $path = public_path('css/style.css');
    $content = File::exists($path) ? File::get($path) : '';
    
    // Retourneer de view met de juiste gegevens
    return view('admin.files.edit_single', [
        'name' => 'public/css/style.css', 
        'route' => route('admin.files.css.update'), 
        'content' => $content
    ]);
}

public function updateCss(Request $request) {
    File::put(resource_path('css/style.css'), $request->input('content'));
    return back()->with('success', 'style.css bijgewerkt!');
}

// ✅ Bewerken van menu (app.blade.php)
public function editMenu() {
    $path = resource_path('views/layouts/app.blade.php');
    $content = File::get($path);
    return view('admin.files.edit_single', ['name' => 'layouts/app.blade.php', 'route' => route('admin.files.menu.update'), 'content' => $content]);
}

public function updateMenu(Request $request) {
    File::put(resource_path('views/layouts/app.blade.php'), $request->input('content'));
    return back()->with('success', 'Menu (app.blade.php) bijgewerkt!');
}
public function essentials()
{
    // Belangrijke bestanden, inclusief controllers
    $belangrijkeBestanden = [
        'dashboard-openbaar.blade.php',
        'dashboard.blade.php',
        'overons.blade.php',
        'standpunten.blade.php',
        'programma.blade.php',
        'nieuws.blade.php',
        'agenda.blade.php',
        'contact.blade.php',
        'layouts/app.blade.php',
        'public/css/style.css',
        'routes/web.php',
        'app/Http/Controllers/ChatController.php', // Toegevoegd: ChatController
        'app/Http/Controllers/AdminFileController.php', // Toegevoegd: AdminFileController
        'components/header.blade.php', // Toegevoegd: header
        'components/footer.blade.php', // Toegevoegd: footer
        'auth/login.blade.php', // Toegevoegd: login blade
        'auth/register.blade.php', // Toegevoegd: register blade
    ];

    // Verwerken van de bestanden en de bijbehorende routes
    $bladeFiles = collect($belangrijkeBestanden)
        ->filter(fn($name) => File::exists(resource_path('views/' . $name)) || 
                              $name === 'routes/web.php' || 
                              $name === 'public/css/style.css' || 
                              File::exists(base_path($name)))  // Toegevoegd: Controle op controllers
        ->map(fn($name) => [
            'name' => $name,
            'edit_route' => match (true) {
                $name === 'routes/web.php' => route('admin.special.web'),
                $name === 'public/css/style.css' => route('admin.files.css'),
                $name === 'layouts/app.blade.php' => route('admin.files.menu'),
                $name === 'components/header.blade.php' => route('admin.files.blade.edit', ['name' => 'components/header.blade.php']),
                $name === 'components/footer.blade.php' => route('admin.files.blade.edit', ['name' => 'components/footer.blade.php']),
                $name === 'auth/login.blade.php' => route('admin.files.blade.edit', ['name' => 'auth/login.blade.php']),
                $name === 'auth/register.blade.php' => route('admin.files.blade.edit', ['name' => 'auth/register.blade.php']),
                $name === 'app/Http/Controllers/ChatController.php' => route('admin.files.controller.edit', ['name' => 'ChatController.php']),
                $name === 'app/Http/Controllers/AdminFileController.php' => route('admin.files.controller.edit', ['name' => 'AdminFileController.php']),
                default => route('admin.files.blade.edit', ['name' => $name])
            }
        ]);

    // Retourneer de view met de belangrijke bestanden
    return view('admin.files.essentials', compact('bladeFiles'));
}



}