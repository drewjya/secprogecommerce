@extends('layouts.app')

@section('title')
Featured Categories
@endsection


@section('content')

<div id="gambarproduct">
    @foreach ($categories as $item)
        <div class="gambar1">
            <a href="{{ url('category/' . $item->id) }}">
            <div class="gambarsan">
                <img src="{{ asset('asset/uploads/categories/' . $item->image) }}" alt="">
            </div>

            <div class="isitext">
                <h3>{{ $item->name }}</h3>

                <p>{{ $item->description }}</p>
            </div>
            </a>
        </div>

    @endforeach
</div>
@endsection
