@extends('layouts.dash')

@section('content')

    <div class="box">

        <h3>Categories Page</h3>

    </div>

    <table class="table">
        <thead>
            <tr class="head">
                <th>Id</th>
                <th>Name</th>

                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item)
                <tr class="body">

                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>

                    <td>{{ $item->description }}</td>
                    <td><img src="{{ asset('asset/uploads/categories/' . $item->image) }}" alt=""></td>
                    <td>
                        <a href="{{ url('edit-category/' . $item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/' . $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
