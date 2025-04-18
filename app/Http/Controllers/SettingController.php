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
        // Validatie van het logo bestand
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $setting = Setting::firstOrCreate([]);

        // Verwijder het oude logo als het er is
        if ($setting->logo) {
            Storage::delete('public/' . $setting->logo);
        }

        // Upload het nieuwe logo
        $logoPath = $request->file('logo')->store('logos', 'public');
        
        $setting->update(['logo' => $logoPath]);

        return back()->with('success', 'Logo succesvol geüpdatet!');
    }
}
