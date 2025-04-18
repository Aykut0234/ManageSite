<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function uploadLogo(Request $request)
    {
        // Validatie voor het bestand
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Controleer of er een bestand is geüpload
        if ($request->hasFile('logo')) {
            // Verkrijg het bestand
            $logo = $request->file('logo');

            // Sla het bestand op in de "logos" map binnen de public storage
            $path = $logo->store('logos', 'public'); // Het bestand wordt opgeslagen in storage/app/public/logos

            // Verkrijg het relatieve pad voor toegang via de webserver
            $logoPath = 'storage/' . $path; // De link naar het bestand, bijvoorbeeld 'storage/logos/yourimage.jpg'

            // Sla het bestandspad op in de database
            $setting = Setting::first();
            $setting->logo = $logoPath;
            $setting->save();

            return redirect()->back()->with('success', 'Logo succesvol geüpload');
        }

        return redirect()->back()->with('error', 'Geen bestand geselecteerd');
    }

    public function showLogos()
    {
        // Stel het pad in waar je logo's worden opgeslagen
        $logoPath = storage_path('app/public/logos');

        // Verkrijg de lijst van bestanden in de map
        $logos = File::allFiles($logoPath);

        return view('admin.settings.logo', compact('logos'));
    }

    // Wijzig de taal en sla deze op in de sessie
    public function setLanguage($locale)
    {
        $supportedLanguages = ['en', 'fr', 'ru', 'am'];

        if (in_array($locale, $supportedLanguages)) {
            // Zet de taal in de sessie
            Session::put('locale', $locale);
            App::setLocale($locale);  // Stel de taal in voor de huidige sessie
        }

        // Redirect naar de vorige pagina
        return redirect()->back();
    }

    // Haal de vertalingen op uit de sessie
    public function getTranslations()
    {
        // Verkrijg de taal uit de sessie
        $language = Session::get('locale', 'en');  // Standaard 'en' als taal

        // Vertalingen per taal
        $translations = [
            'en' => [
                'welcome_message' => '👋 Welcome to our website',
                'description' => 'This is the public dashboard. Anyone — whether logged in or not — can view this page.',
                'project_overview' => 'project overview',
                'about_us' => 'about us',
                'news_and_agenda' => 'news & agenda',
                'register' => 'Register',
                'login' => 'login',
            ],
            'fr' => [
                'welcome_message' => '👋 Bienvenue sur notre site Web',
                'description' => 'Ceci est le tableau de bord public. N\'importe qui - que vous soyez connecté ou non - peut voir cette page.',
                'project_overview' => 'aperçu du projet',
                'about_us' => 'à propos de nous',
                'news_and_agenda' => 'actualités et agenda',
                'register' => 'S\'inscrire',
                'login' => 'connexion',
            ],
            'ru' => [
                'welcome_message' => '👋 Добро пожаловать на наш сайт',
                'description' => 'Это публичная панель управления. Любой, кто входит в систему или нет, может просматривать эту страницу.',
                'project_overview' => 'обзор проекта',
                'about_us' => 'о нас',
                'news_and_agenda' => 'новости и agenda',
                'register' => 'Зарегистрироваться',
                'login' => 'войти',
            ],
            'am' => [
                'welcome_message' => '👋 Բարի գալուստ մեր կայք',
                'description' => 'Սա հասարակական վահանակն է: Բոլորը՝ թե ներսից, թե արտասահմանից, կարող են դիտել այս էջը:',
                'project_overview' => 'պրոեկտի ակնարկ',
                'about_us' => 'մեր մասին',
                'news_and_agenda' => 'նորություններ և օրակարգ',
                'register' => 'Գրանցվել',
                'login' => 'Մուտք գործել',
            ]
        ];

        // Return the translations for the current language
        return $translations[$language];
    }
}



