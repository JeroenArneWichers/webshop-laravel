@extends('layout')

@section('title')
    {{ $product->name }}
@endsection

@section('content')

<div class="container spacer100">
    <div class="row about-container align-items-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name }}</h4>
                <p class="card-text">{{ $product->details }}</p>
                <p class="card-text">{{ $product->price }}</p>
                <p class="card-text">{{ $product->description }}</p>
                <form action="{{ route('cart.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </div>
            <img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" class="card-img-top" alt="...">
        </div>
    </div>
</div>

@endsection('content')