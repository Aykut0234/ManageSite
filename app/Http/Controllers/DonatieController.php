<?php

namespace App\Http\Controllers;

use App\Services\MolliePaymentService;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonatieController extends Controller
{
    protected $mollie;

    public function __construct(MolliePaymentService $mollie)
    {
        $this->mollie = $mollie;
    }

    public function index()
    {
        return view('doneren');
    }

    public function betalen(Request $request)
    {
        $amount = $request->input('amount');
        $description = 'Donatie voor het project';

        $payment = $this->mollie->createPayment($amount, $description);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function succes()
    {
        return view('succes');
    }

    public function webhook(Request $request)
    {
        $payment = $this->mollie->getPayment($request->id);

        if ($payment && $payment->isPaid()) {
            Donation::create([
                'order_id' => $payment->id,
                'amount' => $payment->amount->value,
                'currency' => $payment->amount->currency,
                'status' => $payment->status
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
