@extends('layouts.app')



@section('content')
    <div class="title-content">
        <p>
            {{ $category->name }}

        </p>
    </div>
    <div id="gambarproduct">
        @foreach ($products as $item)
            <div class="gambar1">
                <a href="{{ url('category/' . $category->name . '/' . $item->id) }}">

                    <div class="gambarsan">
                        <img src="{{ asset('asset/uploads/products/' . $item->image) }}" alt="">
                    </div>

                    <div class="isitext">
                        <p>{{ $item->name }}</p>

                        <p>Rp {{ $item->selling_price }}</p>
                    </div>
                </a>
            </div>

        @endforeach
    </div>
   
@endsection
