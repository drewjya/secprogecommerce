@extends('layouts.app')

@section('title', 'Shopping Cart')
@section('content')
    <div class="contentsss">
        <div class="Cart-Container">
            <div class="bag-atas">

                <a href="{{url('delall')}}" class="Action">Remove all</a>
            </div>
            <div class="tampung">
                @php
                    $total = 0;
                    $itemL = 0;
                @endphp
                @foreach ($cartitems as $item)


                    <div class="Cart-Items">

                        <div class=”image-box”>
                            <img src="{{ asset('asset/uploads/products/' . $item->product->image) }}" alt="Shirt"
                                style="height: 200px;">
                        </div>
                        <div class="about">
                            <h1 class="title">{{ $item->product->name }}</h1>
                        </div>
                        <div class="counter">

                            <div class="count">{{ $item->prod_qty }}</div>

                        </div>
                        <div class="prices">
                            <div class="amount">Rp {{ $item->prod_qty * $item->product->selling_price }}</div>
                            <a href="{{url('delete-cart/'.$item->id)}}"class="remove-button">Remove</a>
                        </div>
                    </div>
                    @php
                    $itemL++;
                        $total += $item->prod_qty * $item->product->selling_price ;
                    @endphp
                @endforeach
                <hr> <br>
                <div class="checkout">
                    <div class="total">
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">{{$itemL}} items</div>

                        <div class="total-amount">Rp {{$total}}</div>
                    </div>
                    <a href="{{url('checkout')}}"><button class="button">Checkout</button></a>
                </div>


            </div>
        </div>

    </div>
@endsection
