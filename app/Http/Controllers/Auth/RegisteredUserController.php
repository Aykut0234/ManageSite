<?php

namespace App\Http\Controllers\Auth;
use App\Providers\RouteServiceProvider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // app/Http/Controllers/Auth/RegisteredUserController.php

public function store(Request $request): RedirectResponse
{
    // Validatie voor de extra velden
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'last_name' => ['required', 'string', 'max:255'], // Validatie voor achternaam
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        'phone_number' => ['required', 'string', 'max:15'], // Validatie voor telefoonnummer
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Nieuwe gebruiker aanmaken
    $user = User::create([
        'name' => $request->name,
        'last_name' => $request->last_name, // Voeg achternaam toe
        'email' => $request->email,
        'phone_number' => $request->phone_number, // Voeg telefoonnummer toe
        'password' => Hash::make($request->password),
    ]);

    // Wijs de 'gebruiker' rol toe aan de nieuwe gebruiker
    $user->assignRole('gebruiker'); // ✅ rol automatisch toewijzen

    // Registreer het nieuwe gebruiker evenement
    event(new Registered($user));

    // Log de gebruiker in
    Auth::login($user);

    // Redirect naar het dashboard of de gewenste route
    return redirect(RouteServiceProvider::HOME);
}


}
