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
        // Validatie voor het logo bestand
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Controleer of er een bestand is geüpload
        if ($request->hasFile('logo')) {
            // Verkrijg het bestand
            $logo = $request->file('logo');
            
            // Sla het bestand op in de public map
            $path = $logo->store('logos', 'public'); // Het bestand wordt opgeslagen in storage/app/public/logos
    
            // Verkrijg het relatieve pad voor de toegang via de webserver
            $logoPath = 'storage/' . $path; // De link naar het bestand, het zal iets zijn als 'storage/logos/yourimage.jpg'
    
            // Sla het bestandspad op in de database of instelling
            $setting = Setting::first(); // Of haal je instelling op
            $setting->logo = $logoPath;
            $setting->save();
    
            // Redirect met succesmelding
            return redirect()->back()->with('success', 'Logo succesvol geüpload');
        }
    
        // Als er geen bestand is geüpload
        return redirect()->back()->with('error', 'Geen bestand geselecteerd');
    }
    

}
