@extends('layouts.app')

@section('title', 'Shopping Cart')
@section('content')
    <div class="contentsss">
        <div class="Cart-Container">
            <div class="bag-atas">
                @php
                    $total = 0;
                    $itemL = 0;
                    $status = false;
                    foreach ($cartitems as $item) {
                        if ($item->prod_qty <= $item->product->quantity) {
                            $itemL++;
                            $total += $item->prod_qty * $item->product->selling_price;
                        }
                    }
                @endphp

                @if ($itemL > 0)

                    <a href="{{ url('delall') }}" class="Action">Remove all</a>
                @endif
            </div>
            @if ($itemL > 0)


                <div class="tampung">

                    @foreach ($cartitems as $item)
                        {{-- @php --}}
                        $status = false;
                        {{-- @endphp --}}

                        <div class="Cart-Items">

                            <div class=”image-box”>
                                <img src="{{ asset('asset/uploads/products/' . $item->product->image) }}" alt="Shirt"
                                    style="height: 200px;">
                            </div>
                            <div class="about">
                                <h1 class="title">{{ $item->product->name }}</h1>
                            </div>
                            @if ($item->prod_qty <= $item->product->quantity)
                                @php
                                    $status = true;
                                @endphp
                                <p>Available</p>
                                <div class="counter">

                                    <div class="count">{{ $item->prod_qty }}</div>

                                </div>
                                <div class="prices">
                                    <div class="amount">Rp {{ $item->prod_qty * $item->product->selling_price }}
                                    </div>
                                    <a href="{{ url('delete-cart/' . $item->id) }}" class="remove-button">Remove</a>
                                </div>
                            @else
                                <p>Not Available</p>
                            @endif
                        </div>

                    @endforeach
                    <hr> <br>
                    <div class="checkout">
                        <div class="total">
                            <div class="Subtotal">Sub-Total</div>
                            <div class="items">{{ $itemL }} items</div>

                            <div class="total-amount">Rp {{ $total }}</div>
                        </div>
                        @if ($itemL > 0)

                            <a href="{{ url('checkout') }}"><button class="button">Checkout</button></a>
                        @endif
                    </div>


                </div>
            @else
                <h3 style="text-align: center">Please add item to cart</h3>
            @endif
        </div>

    </div>
@endsection
