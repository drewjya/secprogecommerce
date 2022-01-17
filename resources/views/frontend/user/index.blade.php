@extends('layouts.app')

@section('title')
    Dashboard User
@endsection

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
                        <a href="{{ url('view-order/'.$order->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
@endsection
