@extends('layout')

@section('title')

    Thank you for ordering
    
@endsection

@section('content')

<section id="about">
    <div class="container spacer100">
        <div class="row about-container align-items-center">
            <div class="col-lg-6 content order-lg-1 order-1">
                <h2 class="title">SALVE LOREM!</h2>
                <p>On behalf of the Senate and the People of Rome let me thank you for ordering
                    from the greatest shop of Rome.<p>
                <p>Please enjoy your purchase and continue eploring our fine site.</p>
                <div class="cart-buttons">
                    <a href="{{ route('shop.index') }}" class="btn btn-danger btn-lg btn-block">Continue Shopping</a>
                </div>
            </div>

            <div class="col-lg-6 background order-lg-2 order-2">
                <div class="card border-dark mb-3" style="width: 36rem;">
                    <img src="img/thankyou.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-center">The gods thank you for your patronage</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection('content')