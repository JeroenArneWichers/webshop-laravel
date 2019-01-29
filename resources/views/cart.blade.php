@extends('layout')

@section('title', 'Shopping Cart')

@section('content')

@if (Cart::count() > 0)
<div class="cart-section container">
    <div>
            @if (session()->has('success_message'))
            <div>
                {{ session()->get('success_message') }}
            </div>
            @endif
    
            @if(count($errors) > 0)
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1>{{ Cart::count() }} product(s) in your cart</h1>

        <div class="cart-table">
            @foreach (Cart::content() as $item)
            <div class="cart-table-row">
                <div class="cart-table-row-left">
                    <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ asset('img/products/'.$item->model->slug.'.jpg') }}" alt="item" class="cart-table-img"></a>
                    <div class="cart-item-details">
                        <div class="cart-table-item"><a href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a></div>
                        <div class="cart-table-description">{{ $item->model->details }}</div>
                    </div>
                </div>
                <div class="cart-table-row-right">
                    <div class="cart-table-actions">
                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">Remove from cart</button>
                        </form>
                    </div>
                    <div>{{ $item->model->price }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="cart-totals">
            <div class="cart-totals-left">
                <p>The Senate and the People of Rome did their best to procure these items at the best of
                prices.</p> 
                <p>Gracchus will be even jelous of these savings! </p>
            </div>

            <div class="cart-totals-right">
                <div>
                    Total amount <br>
                    {{-- <span class="cart-totals-total">Total</span> --}}
                </div>
                <div class="cart-totals-subtotal">
                    {{ Cart::subtotal() }} <br>
                    {{-- <span class="cart-totals-total">{{ Cart::total() }}</span> --}}
                </div>
            </div>
        </div>
        <div class="cart-buttons">
            <a href="{{ route('shop.index') }}" class="btn btn-danger">Continue Shopping</a>
            <a href="{{ route('checkout.index') }}" class="btn btn-danger">Proceed to Checkout</a>
        </div>
    </div>
</div>
        
   





@else
 
    <h3>No products in your cart</h3>

@endif



@endsection('content')