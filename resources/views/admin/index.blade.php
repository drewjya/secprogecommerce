@extends('layouts.admin')

@section('content')
    @if (count($orders) < 0)
        <div class="Cart-Container">
        </div>
    @endif
    <table class="table" style="width:80%; margin:100px auto ;">
        <thead>
            <tr class="head">
                <th>Tracking Number</th>
                <th>Total Price</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach ($orders as $order)
            <tbody>
                <tr class="body">
                    <td>{{ $order->track_no }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        <a href="{{ url('adminview-order/' . $order->id) }}" class="btn btn-primary">View</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
        <thead>
            <tr class="head">
                <th></th>
                <th><a style="text-decoration: none; color:red" href="{{ url('/') }}">Home</a></th>
                <th></th>
            </tr>
        </thead>
    </table>
@endsection


{{-- @extends('layouts.admin')

@section('content')
<div class="box">

    <h3>Dashboard Page</h3>
    <a style="text-decoration: none; color:white" href="{{url('/')}}">
    <button style="border: none; width:150px; padding:20px 20px; background-color:rgb(255, 27, 76); color:white" >

            Go To Home
        </button>
    </a>

</div>
@endsection --}}
