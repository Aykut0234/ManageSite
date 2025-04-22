<?php

namespace App\Services;

use Mollie\Api\MollieApiClient;

class MollieService
{
    protected $mollie;

    public function __construct()
    {
        // Maak verbinding met de Mollie API
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey(env('MOLLIE_API_KEY'));  // Haal de API-sleutel uit .env
    }

    public function createPayment($amount, $description)
    {
        try {
            $payment = $this->mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",  // De valuta (standaard EUR)
                    "value" => number_format($amount, 2, '.', '')  // Zorg ervoor dat het formaat correct is
                ],
                "description" => $description,
                "redirectUrl" => route('donation.success'),  // Redirect na succesvolle betaling
                "webhookUrl" => route('donation.webhook'),  // Webhook voor betaling verifiëren
                "method" => "ideal",  // Stel de betaalmethode in op iDEAL
                "metadata" => [
                    "order_id" => uniqid(),
                ]
            ]);
    
            return $payment;
        } catch (\Exception $e) {
            // Foutafhandelingslogica
            return false;
        }
    }
    
}
