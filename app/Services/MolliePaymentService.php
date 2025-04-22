<?php

namespace App\Services;

use Mollie\Api\MollieApiClient;
use Illuminate\Support\Facades\Config; // ✅ Voeg deze regel toe

class MolliePaymentService
{
    protected $mollie;

    public function __construct()
    {
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey(Config::get('services.mollie.key')); // 👈 juiste manier
    }

    public function createPayment($amount, $description)
    {
        return $this->mollie->payments->create([
            'amount' => [
                'currency' => 'EUR',
                'value' => number_format($amount, 2, '.', '')
            ],
            'description' => $description,
            'redirectUrl' => route('donatie.succes'),
            'webhookUrl' => route('donatie.webhook'),
            // Laat method weg voor alle methodes
            'metadata' => [
                'order_id' => uniqid()
            ]
        ]);
    }

    public function getPayment($paymentId)
    {
        try {
            return $this->mollie->payments->get($paymentId);
        } catch (\Exception $e) {
            return null;
        }
    }
}
