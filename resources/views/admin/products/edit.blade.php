@extends('layouts.admin')

@section('content')
    <div class="overview-boxes">
        <form action="{{ url('update-product/' . $product->id) }}" method="post" enctype="multipart/form-data">
            <label>
                <h5>Edit Product</h5>
            </label>
            @csrf
            <br>
            <label for="cate_id">Category</label><br>
            <select name="cate_id" id="select">
                <option value="{{ $product->cate_id }}">{{ $product->category->name }}</option>
                @foreach ($categories as $item)
                    @if ($item->id != $product->cate_id)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endif
                @endforeach
            </select><br><br>
            <label for="name">Name</label><br>
            <input type="text" value="{{ $product->name }}" name="name"><br><br>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" value="{{ $product->slug }}"><br><br>
            <label for="small_descriptions">Small Description</label><br>
            <input type="text" name="small_descriptions" value="{{ $product->small_descriptions }}"><br><br>
            <label for="descriptions">Descriptions</label><br>
            <textarea name="descriptions" rows="5">{{ $product->descriptions }}</textarea><br>
            <label for="status">Status</label>
            <input type="checkbox" name="status"{{ $product->status == 1 ? 'checked' : '' }}  id="status"><br>
            <label for="trending">Trending</label>
            <input type="checkbox" {{ $product->trending == 1 ? 'checked' : '' }}  name="trending" id="trending">
            <br>
            <br>
            <label for="original_price">Original Price</label>
            <input type="number" name="original_price" value="{{ $product->original_price }}"><br>
            <br>
            <label for="selling_price">Selling Price</label>
            <input type="number" name="selling_price" value="{{ $product->selling_price }}"><br>
            <br>
            <label for="tax">Tax</label>
            <input type="number" name="tax" value="{{ $product->tax }}"><br>
            <br>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" value="{{ $product->quantity }}"><br>
            <br>

            <label for="meta_title">Meta Title</label><br>
            <input type="text" name="meta_title" value="{{ $product->meta_title }}"><br><br>
            <label for="meta_descriptions">Meta Description</label><br>
            <input type="text" name="meta_descriptions" value="{{ $product->meta_descriptions }}"><br><br>
            <label for="meta_keywords">Meta Keywords</label><br>
            <input type="text" name="meta_keywords" value="{{ $product->meta_keywords }}"><br><br>
            @if ($product->image)
            <img width="100px" height="100px" src="{{ asset('asset/uploads/products/' . $product->image) }}"
            alt="">
            @endif
            <input type="file" name="image" id="imageIn"><br>
            <button type="submit">Update</button>
        </form>

    </div>
@endsection
