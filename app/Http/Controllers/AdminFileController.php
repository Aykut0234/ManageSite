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

    // Bewerk een specifiek bladae-bestand
    public function editBlade($name)
{
    $name = urldecode($name);
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
    public function updateBlade(Request $request, $name)
    {
        $path = resource_path('views/' . $name);
        abort_unless(File::exists($path), 404);

        File::put($path, $request->input('content'));
        return redirect()->back()->with('success', 'Bestand opgeslagen.');
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
    $files = collect(\File::allFiles(app_path('Http/Controllers')))
        ->filter(fn($file) => str_ends_with($file->getFilename(), '.php'));

    return view('admin.files.controllers', compact('files'));
}

// Bewerk specifieke controller
public function editController($name)
{
    $name = urldecode($name);
    $fullPath = app_path('Http/Controllers/' . $name);

    if (!file_exists($fullPath)) {
        abort(404, 'Controller niet gevonden');
    }

    $content = \File::get($fullPath);

    return view('admin.files.edit_controller', compact('name', 'content'));
}

// Sla wijzigingen op
public function updateController(Request $request, $name)
{
    $name = urldecode($name);
    $fullPath = app_path('Http/Controllers/' . $name);

    if (!file_exists($fullPath)) {
        abort(404, 'Controller niet gevonden');
    }

    \File::put($fullPath, $request->input('content'));

    return back()->with('success', 'Controller opgeslagen!');
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
    $path = resource_path('css/style.css');
    $content = File::exists($path) ? File::get($path) : '';
    return view('admin.files.edit_single', ['name' => 'resources/css/style.css', 'route' => route('admin.files.css.update'), 'content' => $content]);
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


}