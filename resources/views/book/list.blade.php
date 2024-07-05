@extends('layout')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <div class="title mb-2">
            <h1 class="fs-2 fw-bold">Daftar List Buku</h1>
        </div>
        <div class="addButton mb-4 mt-2">
            <a href="{{route('book.new')}}" class="btn btn-success fw-normal">Add New</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Description</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Author</th>
                    <th scope="col">Cover</th>
                    <th scope="col">Publication year</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $books as $no=>$data)

                @endforeach
                <tr>
                    <th>{{$no+1}}</th>
                    <td>{{$data->title}}</td>
                    <td>{{$data->isbn}}</td>
                    <td>{{Str::limit($data->description,10)}}</td>
                    <td>{{$data->genre}}</td>
                    <td>{{$data->author}}</td>
                    <td>{{$data->image}}</td>
                    <td>{{$data->publication_year}}</td>
                    <td class="d-flex gap-2">
                        <a href="{{route('book.editBook', $data->id)}}" class="btn  btn-primary btn-sm">Edit</a>
                        <form action="{{route('book.deleteBook', $data->id)}}" method="post"
                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection