@extends('frontend.master')

@section('title', 'Booking')
@section('content')
<style>
    .CardField-input-wrapper{
        margin-top:10px;
    }
</style>
<div id="content_wrapper">
    <!--page title Start-->
    <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
        style="background-image:url(assets/images/bg/page_title_bg.jpg);">
        <ul>
            <li><a href="javascript:;">Tour package - booking</a></li>
        </ul>
    </div>
    <!--page title end-->
    <div class="clearfix"></div>
    <div class="full_width destinaion_sorting_section">

        <div class="container">
            <div class="row space_100">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Package </th>
                                    <th>Image </th>
                                    <th>Duration </th>
                                    <th>Person</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if (isset($package->image))
                                        <img src="{{ asset(json_decode($package->image)[0]) }}" style="height: 100px"
                                            alt="slide">
                                        @else
                                        <img src="https://placehold.co/100" alt="Default Image">
                                        @endif
                                    </td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->duration }}</td>
                                    <td>{{ $package->person }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('stripe.payment') }}" method="POST" id="payment-form">
                            @csrf
                            <input type="hidden" name="price" value="{{ $package->price }}">
                            <input type="hidden" name="stripeToken" id="stripeToken">

                            <label for="card-element" style="margin-bottom: 20px">
                                Credit or debit card
                            </label>

                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" class="mt-3" role="alert"></div>

                            <button class="btn btn-info mt-3">Submit Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    // Handle real-time validation errors from Stripe
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    $(document).on('submit','#payment-form', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                var token = result.token;
                stripeTokenHandler(result.token);
                var url = $('#payment-form').attr('action');
                var formData = $('#payment-form').serialize();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    success:function(response)
                    {
                        window.location = "{{ route('book.package', ['id' => $package->id]) }}";
                    },
                    error: function(response) {
                    }
                });
            }
        });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        $('#stripeToken').val(token.id);
        return true;
    }
</script>
@endpush