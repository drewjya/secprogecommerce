@extends('layouts.app')

@section('title')
    Dashboard User
@endsection

@section('content')
   
    <h3>Name : {{ $order->name }}</h3>
    <table class="table" style="width:80%; margin:100px auto ;">
        <thead>
            <tr class="head">

            </tr>
        </thead>
        {{-- @foreach ($order as $data)
            <tbody>
                <tr class="body">

                </tr>
            </tbody>
        @endforeach --}}
    </table>
@endsection
