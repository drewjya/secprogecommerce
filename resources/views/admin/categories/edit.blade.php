@extends('layouts.dash')

@section('content')
    <div class="overview-boxes">
        <form action="{{ url('update-category/' . $category->id) }}" method="post" enctype="multipart/form-data">
            <label>
                <h5>Edit Category</h5>
            </label>

            @csrf

            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{ $category->name }}"><br><br>
            <label for="slug">Slug</label><br>
            <input type="text" value="{{ $category->slug }}" name="slug"><br><br>
            <label for="description">Description</label><br>
            <textarea name="description" rows="5">{{ $category->description }}</textarea><br>
            <label for="status">Status</label>
            <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked' : '' }} id="status"><br>
            <label for="popular">Popular</label>
            <input type="checkbox" {{ $category->popular == 1 ? 'checked' : '' }} name="popular" id="popular"><br><br>

            <label for="meta_title">Meta Title</label><br>
            <input type="text" value="{{ $category->meta_title }}" name="meta_title"><br><br>
            <label for="meta_descrip">Meta Description</label><br>
            <input type="text" value="{{ $category->meta_descrip }}" name="meta_descrip"><br><br>
            <label for="meta_keywords">Meta Keywords</label><br>
            <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}"><br><br>
            @if ($category->image)
                <img width="100px" height="100px" src="{{ asset('asset/uploads/categories/' . $category->image) }}" alt="">
            @endif
            <input type="file" name="image" id="imageIn"><br>
            <button type="submit">Update</button>
        </form>

    </div>
@endsection
