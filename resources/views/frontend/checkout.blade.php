@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="contentsss">
        <form action="{{ url('place-order') }}" method="post">
            @csrf
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
            <div class="Cart-Container">
                @if ($itemL > 0)
                    <div class="alamat">

                        <label for="address">Address</label>
                        <br>
                        <textarea name="address" rows="5">Jalan </textarea><br>
                    </div>
                    <div class="bag-atas">
                        <a href="{{ url('delall') }}" class="Action">Remove all</a>
                    </div>
                    <div class="tampung">
                        @foreach ($cartitems as $item)
                            <div class="Cart-Items">
                                <div class=”image-box”>
                                    <img src="{{ asset('asset/uploads/products/' . $item->product->image) }}" alt="Shirt"
                                        style="height: 200px;">
                                </div>
                                <div class="about">
                                    <h1 class="title">{{ $item->product->name }}</h1>
                                </div>
                                <p>Available</p>
                                <div class="counter">
                                    <div class="count">{{ $item->prod_qty }}</div>
                                </div>
                                <div class="prices">
                                    <div class="amount">Rp {{ $item->prod_qty * $item->product->selling_price }}
                                    </div>
                                    <a href="{{ url('delete-cart/' . $item->id) }}" class="remove-button">Remove</a>
                                </div>
                            </div>
                        @endforeach
                        <hr> <br>
                        <div class="checkout">
                            <div class="total">
                                <div class="Subtotal">Sub-Total</div>
                                <div class="items">{{ $itemL }} items</div>
                                <div class="total-amount">Rp {{ $total }}</div>
                            </div>
                            <a href="{{ url('checkout') }}"><button class="button">Confirm</button></a>
                        </div>
                    </div>
                @else
                    <h3 style="text-align: center">Please add item to cart</h3>
                @endif
            </div>
        </form>
    </div>
@endsection
