@extends('layout')

@section('title')

    welcome to the armory
    
@endsection

@section('content')

<section id="about">
    <div class="container spacer100">
        <div class="row about-container align-items-center">
            <div class="col-lg-6 content order-lg-1 order-1">
                <h2 class="title">SALVE CIVIS!</h2>
                <p>On behalf of the Senate and the People of Rome let me be 
                the first to welcome you to the greatest civilization of 
                the known world.<p>
                <p>One of the pillars of the Roman world was commerce.
                And how can commerce flourish without a nice little place
                where to show of your wares and order products?</p>
                <p>Welcome to the greatest shop sine the time of August!</p>
                <a href="/shop"><button type="button" class="btn btn-danger btn-lg btn-block">Shop page</button></a>
            </div>

            <div class="col-lg-6 background order-lg-2 order-2">
                <div class="card border-dark mb-3" style="width: 36rem;">
                    <img src="img/spqr-forum-augustus.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-center">The forum was the place where tradesmen did their business dealings.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container spacer100">
            <div class="row about-container align-items-center">
                @foreach ($products as $product)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="card-deck">
                        <div class="card" style="width: 18rem;">
                        <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" class="card-img-top" alt="..."></a>
                            <div class="card-body">
                                    <a href="{{ route('shop.show', $product->slug) }}"><h5 class="card-title">{{ $product->name }}</h5></a>
                                <p class="card-text">{{ $product->price }}</p>
                            </div>
                        </div>
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
</section>

@endsection('content')