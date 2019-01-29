@extends('layout')

@section('title')
    Shop Page
@endsection

@section('content')
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
@endsection('content')