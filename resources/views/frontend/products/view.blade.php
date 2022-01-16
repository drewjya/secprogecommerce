@extends('layouts.app')

@section('content')
    <div class="contentsss">
        <div class="grid">
            <img src="{{ asset('asset/uploads/products/' . $products->image) }}" alt="">
            <h1 class="body-title">{{ $products->name }}</h1>
            <p class="body-content">{{ $products->descriptions }}</p>
            <p class="body-content1">Rp {{ $products->selling_price }}</p>
            <div class="counter">
                <form action="{{ url('add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="prod_id" value="{{ $products->id }}">
                    <input class="count" id="valinp" name="prod_qty" value="1">

                    <button type="submit" class="dropbtn addsom">Add to Cart</button>
                </form>
            </div>

        </div>
    </div>
@endsection
