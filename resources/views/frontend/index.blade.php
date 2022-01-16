@extends('layouts.app')

@section('slideshow')
    <div class="contain">
        <div class="content section-content">
            @foreach ($featured_products as $prod)
                <img src="{{ asset('asset/uploads/products/' . $prod->image) }}" alt="" class="slides animate">
            @endforeach
        </div>
    </div>
@endsection
@section('title')
    Featured Product
@endsection
@section('content')

    <div id="gambarproduct">
        @foreach ($featured_products as $item)
            <div class="gambar1">
                <a href="{{url('category/'.$item->category->name.'/'.$item->id)}}">
                <div class="gambarsan">
                    <img src="{{ asset('asset/uploads/products/' . $item->image) }}" alt="">
                </div>

                <div class="isitext">
                    <h3>{{ $item->name }}</h3>

                    <p>Rp {{ $item->selling_price }}</p>
                </div>
                </a>
            </div>

        @endforeach
    </div>

    <div class="title-content">
        <p>
            Trending Categories

        </p>
    </div>
    <div id="gambarproduct">
        @foreach ($trending_categories as $item)
            <div class="gambar1">
                <a href="{{ url('category/' . $item->id) }}">

                    <div class="gambarsan">
                        <img src="{{ asset('asset/uploads/categories/' . $item->image) }}" alt="">
                    </div>

                    <div class="isitext">
                        <p>{{ $item->name }}</p>

                        <p>{{ $item->description }}</p>
                    </div>
                </a>
            </div>

        @endforeach
    </div>

@endsection

@section('scripts')
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("slides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2500);
        }
    </script>
@endsection
