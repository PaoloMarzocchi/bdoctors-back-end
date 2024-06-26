<?php

namespace App\Http\Controllers;

use App\Models\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/* use App\Http\Requests\StoreSponsorshipRequest; */


class PaymentController extends Controller
{
    public function token(Request $request, Sponsorship $sponsorship)
    {


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

            // STORE THE NEW SPONSORSHIP IN DB PIVOT TABLE
            $user = Auth::user();

            $sponsorships = Sponsorship::all();
            foreach ($sponsorships as $sponsor) {

                if ($sponsorship->period == $sponsor->period && $sponsorship->price == $sponsor->price && $sponsorship->name == $sponsor->name) {
                    date_default_timezone_set('Europe/Rome');
                    $startDate = date('Y-m-d H:i:s');



                    $expirationDates = DB::table('doctor_profile_sponsorship')
                        ->where('doctor_profile_id', $user->doctorProfile->id)
                        ->pluck('expirationDate');


                    foreach ($expirationDates as $expDate) {

                        if ($startDate < $expDate) {
                            $startDate = $expDate;
                        }
                    }


                    $expirationDate = date('Y-m-d H:i:s', strtotime('+' . $sponsorship->period . ' hours', strtotime($startDate)));

                    $user->doctorProfile->sponsorships()->attach($sponsorship, ['expirationDate' => $expirationDate]);
                }
            }


            //return view('dashboard');
        }

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.sponsorship.payment', ['token' => $clientToken, 'sponsorship' => $sponsorship]);
    }
}
