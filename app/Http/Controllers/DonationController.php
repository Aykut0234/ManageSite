<?php

namespace App\Http\Controllers;

use App\Services\MollieService;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    protected $mollieService;

    public function __construct(MollieService $mollieService)
    {
        $this->mollieService = $mollieService;
    }

    public function showDonationPage()
    {
        return view('doneren'); // Zorg ervoor dat je de juiste view hebt
    }

    public function createPayment(Request $request)
    {
        $amount = $request->input('amount');
        $description = 'Donatie voor de website'; // Pas dit aan

        // Maak de betaling via Mollie
        $payment = $this->mollieService->createPayment($amount, $description);

        if ($payment) {
            // Redirect de gebruiker naar de Mollie betaalsite
            return redirect($payment->getCheckoutUrl(), 303);
        } else {
            // Als er een fout is, geef een foutmelding weer
            return back()->with('error', 'Er is een probleem met de betaling.');
        }
    }

    public function success()
    {
        // Deze pagina wordt weergegeven na een succesvolle betaling
        return view('doneren.success');  // Maak een succespagina aan die de gebruiker bedankt voor de donatie
    }
    
    // Eventuele webhook voor Mollie om de betaling te verifiëren
    public function webhook(Request $request)
    {
        // Haal de betaling op via de Mollie API
        $payment = $this->mollie->payments->get($request->id);
    
        // Verwerk de betalingstatus (geval: betaald, niet betaald, etc.)
        if ($payment->isPaid()) {
            // Werk je database bij of geef de gebruiker een bevestiging
            // Bijv. bevestig de betaling in de database
        }
    }
}
