@extends('layouts.admin')

@section('content')
    {{ $loading = false }}
    {{-- Bottone per sidebar --}}
    <button class="btn rounded border mb-3 m-1 d-lg-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="container pt-5">
        <div id="loading"></div>

        <div id="payment-container" class="d-flex justify-content-center">
            <div class="card bg-body-secondary">
                @csrf
                <div id="card-payment" class="card-body">
                    <div id="dropin-wrapper">
                        <div class="mb-3" id="checkout-message">
                            You have selected: <br>
                            <span class="my_primary fw-bold fs-4"> {{ $sponsorship->name }}</span>
                        </div>
                        <div id="dropin-container">

                        </div>
                        <div class="d-flex flex-column align-items-center my-2">
                            <div class="card-title">
                                Checkout:
                                <span class="text-success fw-bold fs-3">{{ $sponsorship->price }} €</span>
                            </div>
                            <button id="submit-button" type="submit"
                                class="btn my_btn_primary btn-md px-4 rounded-pill my-3">
                                Submit
                            </button>

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
                    // paypal: {
                    //     flow: 'checkout',
                    //     amount: {{ $sponsorship->price }},
                    //     currency: 'EUR',
                    //     buttonStyle: {
                    //         color: 'blue',
                    //         shape: 'rect',
                    //         size: 'responsive',
                    //         label: 'paypal',
                    //         layout: 'vertical'
                    //     }
                    // },
                    // googlePay: {
                    //     googleMerchantId: 'merchant-id-from-google',
                    //     googlePayVersion: 2,
                    //     transactionInfo: {
                    //         currencyCode: "EUR",
                    //         countryCode: "IT",
                    //         totalPriceStatus: "FINAL",
                    //         totalPrice: {{ $sponsorship->price }},
                    //         checkoutOption: "COMPLETE_IMMEDIATE_PURCHASE"
                    //     },
                    //     button: {
                    //         buttonColor: "black",
                    //         buttonType: "pay",
                    //         buttonSizeMode: "fill"
                    //     }
                    // }
                },
                function(err, instance) {
                    button.addEventListener('click', function() {

                        instance.requestPaymentMethod(function(err, payload) {

                            if (typeof payload !== 'undefined') {

                                $('#submit-button').remove();

                                (function($) {
                                    $(function() {

                                        let loading = "{{ $loading }}";
                                        loading = true;

                                        if (loading) {

                                            $('#loading').html(
                                                `<div class="d-flex justify-content-center my-5">
                                                <div class="spinner-border" role="status">
                                                    <span class="visually-hidden">Caricamento...</span>
                                                </div>
                                                </div>`
                                            );
                                        }

                                        $.ajaxSetup({

                                            headers: {
                                                'X-CSRF-TOKEN': $(
                                                        'meta[name="csrf-token"]')
                                                    .attr('content')
                                            }
                                        });

                                        $.ajax(

                                            {
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
                                                    <p>Congratulation, you add <span class="my_primary fw-bold"> {{ $sponsorship->name }}</span> to your profile !</p>
                                                    <p>Add more time to your existing sponsorship : </p>
                                                    <a class="btn my_btn_primary btn-md px-4 rounded-pill my-3" href="{{ route('admin.sponsorship.index') }}">
                                                        Sponsorships
                                                    </a>`

                                                    );

                                                    loading = false;
                                                    $('#loading').remove();


                                                },
                                                error: function(data) {
                                                    console.log('error', payload
                                                        .nonce)
                                                    $('#checkout-message').html(
                                                        '<h1>Error</h1><p>Check your payment method and try again</p>'
                                                    );
                                                    loading = false;
                                                    $('#loading').remove();
                                                }
                                            }

                                        );

                                    });

                                })(jQuery);
                            }
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
