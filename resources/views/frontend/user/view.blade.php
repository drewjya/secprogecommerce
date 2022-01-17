@extends('layouts.app')

@section('title')
    Dashboard User
@endsection

@section('content')


    <table class="table" style="width:80%; margin:100px auto ;">
        <thead>
            <tr class="head">
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        @foreach ($order->orderItems as $data)
            <tbody>
                <tr class="body">
                    <td>{{ $data->product->name }}</td>
                    <td>{{ $data->qty }}</td>
                    <td>{{ $data->price * $data->qty }}</td>
                    <td><img src="{{ asset('asset/uploads/products/' . $data->product->image) }}" alt=""></td>

                </tr>
            </tbody>
        @endforeach
        <thead>
            <tr class="head">
                <th></th>
                <th></th>
                <th>Grand Total : {{ $order->total_price }}</th>
                <th></th>
            </tr>
        </thead>
    </table>
@endsection
