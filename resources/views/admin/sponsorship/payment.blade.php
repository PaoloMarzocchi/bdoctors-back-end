@extends('layouts.app')

@section('content')
  <div class="py-12">

    <div class="d-flex justify-content-center">
      {{ $sponsorship->price }}
    </div>

    @csrf
    <div id="dropin-wrapper" style="width: 20%" class="container">
      <div id="checkout-message"></div>
      <div id="dropin-container"></div>
      {{-- <form action="{{ route('admin.sponsorship.store') }}" method="post">
                @csrf
            </form> --}}
      <button id="submit-button" type="submit" class="btn btn-dark text-success">Submit payment</button>
    </div>


    <script>
      var button = document.querySelector('#submit-button');
      braintree.dropin.create({
        authorization: 'sandbox_gpfmdzyr_8z3hxnydn4f53rdg',
        selector: '#dropin-container'
      }, function(err, instance) {
        button.addEventListener('click', function() {
          instance.requestPaymentMethod(function(err, payload) {
            (function($) {
              $(function() {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
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
                    console.log('success', payload.nonce)
                    $('#checkout-message').html(
                      `<h1 class="text-success">Success !</h1>
                                            <p>Congratulation, you add a sponsorship to your profile !</p>
                                            <p>👇 Add more time to your existing sponsorship </p>
                                            <a class="btn btn-dark my_primary" href="{{ route('admin.sponsorship.index') }}">
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
-Fix the store []
-More payment methods []
--}}
