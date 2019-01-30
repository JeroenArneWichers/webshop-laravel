@extends('layout')

@section('title', 'Checkout')

@section('extra-css')

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

<div class="container-fluid spacer100">

        @if (session()->has('success_message'))
        <div class="spacer"></div>
        <div class="alert alert-success">
            {{ session()->get('success_message') }}
        </div>
    @endif

    @if(count($errors) > 0)
        <div class="spacer"></div>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                
                    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <h2>Billing Details</h2>       
                        <div>        
                            <label for="email">Email Address</label>    
                            <input type="email" class="form-control" id="email" name="email"  required> 
                        </div>
                        <br>
                        <div>
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name"  required>
                        </div>
                        <br>
                        <div>
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"  required>
                        </div>
                        <br>
                        <div>      
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city"  required>
                        </div>
                        <br>
                        <div>
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province"  required>
                        </div> 
                        <br>       
                        <div>
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode"  required>
                        </div>
                        <br>
                        <div>
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                        <br>
                        {{ csrf_field() }}
                        <h2>Payment Details</h2>
                        <div class="form-group">
                            <label for="name_on_card">Name on Card</label>
                            <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                        </div>
                        <div class="form-group">
                            <label for="card-element">
                              Credit or debit card
                            </label>
                            <div id="card-element">
                              <!-- a Stripe Element will be inserted here. -->
                            </div>
                            <!-- Used to display form errors -->
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="spacer"></div>
                        <button type="submit" id="complete-order" class="button-primary full-width">Complete Order And Pay</button>
                    </form>
                    

                    
            </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h2>Your Order</h2>
                    <div>
                        @foreach (Cart::content() as $item)
                        <div>
                            <div>
                                <img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="..." class="checkout-img">
                                <div>
                                    <br>
                                    <div>Item name: {{ $item->model->name }}</div>
                                    <div>Item details: {{ $item->model->details }}</div>
                                    <div>Item price: {{ $item->model->price }}</div>
                                </div>
                            </div> 
                        </div> 
                        <br>
                        <hr>
                        <br>
                        @endforeach
                    </div>
                    <div>
                        <div>
                            Total amount<br>                                                        
                        </div>               
                        <div>       
                            {{ Cart::subtotal() }} <br>                                                        
                        </div>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')

@section('extra-js')
<script>

(function(){

    // Create a Stripe client.
var stripe = Stripe('pk_test_UfxgN6ENczDqTB1PnbUqaQiY');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

  stripe.createToken(card, options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

})();

</script>
@endsection