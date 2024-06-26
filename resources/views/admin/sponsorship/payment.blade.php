@extends('layouts.app')

@section('content')

    <div class="py-5">
        <div class="d-flex justify-content-center">
            <div class="card w-25 bg-body-secondary">
                @csrf
                <div class="card-body">
                    <div id="dropin-wrapper">
                        <div id="checkout-message"></div>
                        <div id="dropin-container"></div>
                        <div class="d-flex justify-content-between align-items-center my-2">
                            <button id="submit-button" type="submit" class="btn btn-dark text-success">
                                Submit
                                payment
                            </button>
                            <div class="card-title">
                                Checkout:
                                <span class="text-success">{{ $sponsorship->price }} €</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                    authorization: 'sandbox_gpfmdzyr_8z3hxnydn4f53rdg',
                    selector: '#dropin-container',
                    vaultManager: true,
                    paypal: {
                        flow: 'checkout',
                        amount: '10.00',
                        currency: 'USD',
                        buttonStyle: {
                            color: 'blue',
                            shape: 'rect',
                            size: 'responsive',
                            label: 'paypal',
                            layout: 'vertical'
                        }
                    },
                    googlePay: {
                        /* googleMerchantId: 'merchant-id-from-google', */
                        googlePayVersion: 2,
                        transactionInfo: {
                            currencyCode: "USD",
                            countryCode: "US",
                            totalPriceStatus: "FINAL",
                            totalPrice: "12.00",
                            checkoutOption: "COMPLETE_IMMEDIATE_PURCHASE"
                        },
                        button: {
                            buttonColor: "black",
                            buttonType: "pay",
                            buttonSizeMode: "fill"
                        }
                    }
                },
                function(err, instance) {
                    button.addEventListener('click', function() {
                        instance.requestPaymentMethod(function(err, payload) {
                            (function($) {
                                $(function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]')
                                                .attr('content')
                                        }
                                    });
                                    $.ajax({
                                        type: "POST",
                                        url: "{{ route('admin.token', $sponsorship) }}",
                                        data: {
                                            nonce: payload.nonce
                                        },
                                        success: function(data) {
                                            console.log('success', payload
                                                .nonce)
                                            $('#checkout-message').html(
                                                `<h1 class="text-success">Success !</h1>

                                            <p>Congratulation, you add a sponsorship to your profile !</p>
                                            <p>Add more time to your existing sponsorship </p>
                                            <a class="btn btn-dark my_primary my-2" href="{{ route('admin.sponsorship.index') }}">
                                                Sponsorships
                                            </a>`

                                            );
                                        },
                                        error: function(data) {
                                            console.log('error', payload.nonce)
                                            $('#checkout-message').html(
                                                '<h1>Error</h1><p>Check your payment method and try again</p>'
                                            );
                                        }
                                    });
                                });
                            })(jQuery);
                        });
                    });
                });
        </script>
    </div>

@endsection

{{-- 
## FIX ##
-Pass our variables [X]
-Success & Errors in page [X]
-Fix the send AFTER we click on button instead of auto-pay [X]
-Fix the store [X]
-More payment methods []
--}}
