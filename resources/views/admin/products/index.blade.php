@extends('layouts.admin')

@section('content')

    <div class="box">

            <h3>Products Page</h3>

    </div>

<table class="table">
    <thead>
        <tr class="head">
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Original Price</th>
            <th>Selling Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
        <tr class="body">
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->category->name}}</td>
            <td>{{$item->descriptions}}</td>
            <td>Rp {{$item->original_price}}</td>
            <td>Rp {{$item->selling_price}}</td>
            <td><img src="{{asset('asset/uploads/products/'.$item->image)}}" alt=""></td>
            <td>
                <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{url('delete-product/'.$item->id)}}"  class="btn btn-danger">Delete</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection
