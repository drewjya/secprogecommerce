@extends('layouts.app')

@section('title')
    Checkout
@endsection

@section('content')
    <div class="contentsss">
<form action="{{url('place-order')}}" method="post">
    @csrf
        <div class="Cart-Container">
            <div class="alamat">

                <label for="address">Address</label>
                <br>
                <textarea name="address" rows="5">Jalan </textarea><br>
            </div>
            <div class="bag-atas">
                <a href="{{ url('delall') }}" class="Action">Remove all</a>
            </div>
            <div class="tampung">
                @php
                    $total = 0;
                    $itemL = 0;
                    $status = false;
                @endphp
                @foreach ($cartitems as $item)
                    @php
                        $status = false;
                    @endphp

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
                                <div class="amount">Rp {{ $item->prod_qty * $item->product->selling_price }}</div>
                                <a href="{{ url('delete-cart/' . $item->id) }}" class="remove-button">Remove</a>
                            </div>
                        @else
                            <div class="counter">

                            </div>
                            <div class="prices">
                                <p>Not Available</p>

                                <a href="{{ url('delete-cart/' . $item->id) }}" class="remove-button">Remove</a>
                            </div>
                        @endif
                    </div>
                    @php
                        if ($status) {
                            # code...
                            $itemL++;
                            $total += $item->prod_qty * $item->product->selling_price;
                        }
                    @endphp
                @endforeach
                <hr> <br>
                <div class="checkout">
                    <div class="total">
                        <div class="Subtotal">Sub-Total</div>
                        <div class="items">{{ $itemL }} items</div>

                        <div class="total-amount">Rp {{ $total }}</div>
                    </div>
                    @if ($total > 0)

                        <a href="{{ url('checkout') }}"><button class="button">Confirm</button></a>
                    @endif
                </div>


            </div>
        </div>
    </form>
    </div>
@endsection
