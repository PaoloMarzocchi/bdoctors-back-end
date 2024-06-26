<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/* use App\Http\Requests\StoreSponsorshipRequest; */


class PaymentController extends Controller
{
    public function token(Request $request, Sponsorship $sponsorship)
    {
        //dd($sponsorship->price);
        $user = Auth::user();
        //dd($user);
        $gateway = new \Braintree\Gateway([
            'environment' => env('BRAINTREE_ENVIRONMENT'),
            'merchantId' => env("BRAINTREE_MERCHANT_ID"),
            'publicKey' => env("BRAINTREE_PUBLIC_KEY"),
            'privateKey' => env("BRAINTREE_PRIVATE_KEY")
        ]);

        if ($request->input('nonce') != null) {
            var_dump($request->input('nonce'));
            $nonceFromTheClient = $request->input('nonce');

            $gateway->transaction()->sale([
                'amount' => $sponsorship->price,
                'paymentMethodNonce' => $nonceFromTheClient,
                'options' => [
                    'submitForSettlement' => True
                ]
            ]);
            //return view('dashboard');
        }

        $clientToken = $gateway->clientToken()->generate();
        $user->doctorProfile->sponsorships()->attach($sponsorship);

        return view('admin.sponsorship.payment', ['token' => $clientToken, 'sponsorship' => $sponsorship]);
    }
}
