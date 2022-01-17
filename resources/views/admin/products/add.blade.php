@extends('layouts.admin')

@section('content')
    <div class="overview-boxes">
        <form action="{{ url('insert-product') }}" method="post" enctype="multipart/form-data">
            <label>
                <h5>Add Product</h5>
            </label>
            @csrf
            <br>
            <label for="cate_id">Category</label><br>
            <select name="cate_id" id="select">
                <option>Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select><br><br>
            <label for="name">Name</label><br>
            <input type="text" name="name"><br><br>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug"><br><br>
            <label for="small_descriptions">Small Description</label><br>
            <input type="text" name="small_descriptions"><br><br>
            <label for="descriptions">Descriptions</label><br>
            <textarea name="descriptions" rows="5"></textarea><br>
            <label for="status">Status</label>
            <input type="checkbox" name="status" id="status"><br>
            <label for="trending">Trending</label>
            <input type="checkbox" name="trending" id="trending">
            <br>
            <br>
            <label for="original_price">Original Price</label>
            <input type="number" name="original_price"><br>
            <br>
            <label for="selling_price">Selling Price</label>
            <input type="number" name="selling_price"><br>
            <br>
            <label for="tax">Tax</label>
            <input type="number" name="tax"><br>
            <br>
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity"><br>
            <br>

            <label for="meta_title">Meta Title</label><br>
            <input type="text" name="meta_title"><br><br>
            <label for="meta_descriptions">Meta Description</label><br>
            <input type="text" name="meta_descriptions"><br><br>
            <label for="meta_keywords">Meta Keywords</label><br>
            <input type="text" name="meta_keywords"><br><br>
            <input type="file" name="image" id="imageIn"><br>
            <button type="submit">Submit</button>
        </form>

    </div>
@endsection
