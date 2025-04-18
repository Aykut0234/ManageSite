<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function showLogoForm()
    {
        $setting = Setting::first();  // Haal de instelling op (bijvoorbeeld het logo)

        return view('admin.settings.logo', compact('setting'));
    }

    public function uploadLogo(Request $request)
{
    // Validatie voor het logo
    $request->validate([
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Controleer of er een bestand is geüpload
    if ($request->hasFile('logo')) {
        $logo = $request->file('logo');
        
        // Sla het bestand op in de public opslag (storage/app/public)
        $path = $logo->store('logos', 'public'); // 'logos' is de map waar het bestand wordt opgeslagen

        // Verkrijg het relatieve pad voor opslaan in je database (optioneel)
        $logoPath = 'storage/' . $path;

        // Sla de pad in je instellingen of database op
        $setting = Setting::first(); // of zoek je instelling op
        $setting->logo = $logoPath;  // sla het logo pad op
        $setting->save();

        // Geef een succesbericht terug
        return redirect()->back()->with('success', 'Logo succesvol geüpload');
    }

    return redirect()->back()->with('error', 'Geen bestand geselecteerd');
}

}
