@extends('layouts.dash')

@section('content')
    <div class="overview-boxes">
        <form action="{{ url('insert-category') }}" method="post" enctype="multipart/form-data">
            <label>
                <h5>Add Category</h5>
            </label>
            @csrf
            <label for="name">Name</label><br>
            <input type="text" name="name"><br><br>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug"><br><br>
            <label for="description">Description</label><br>
            <textarea name="description" rows="5"></textarea><br>
            <label for="status">Status</label>
            <input type="checkbox" name="status" id="status"><br>
            <label for="popular">Popular</label>
            <input type="checkbox" name="popular" id="popular"><br><br>

            <label for="meta_title">Meta Title</label><br>
            <input type="text" name="meta_title"><br><br>
            <label for="meta_descrip">Meta Description</label><br>
            <input type="text" name="meta_descrip"><br><br>
            <label for="meta_keywords">Meta Keywords</label><br>
            <input type="text" name="meta_keywords"><br><br>
            <input type="file" name="image" id="imageIn"><br>
            <button type="submit">Submit</button>
        </form>

    </div>
@endsection
