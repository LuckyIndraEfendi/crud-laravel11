@extends('layout')

@section('content')

<div class="container mt-5 mb-5">
    <h1 class="fs-2 mb-5">Edit Buku</h1>
    <div class="row">
        <div class="col-lg-6">
            <form action="{{ route('book.updateBook',$books->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
                        placeholder="Contoh : Buku Megawati" value="{{$books->title}}">
                </div>
                <div class="mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Contoh : 13138237"
                        value="{{$books->isbn}}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" id="description" style="resize: none;"
                        placeholder="Contoh : Halo Ini adalah...">{{ $books->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="genre" class="form-label">Genre Buku</label>
                    <select class="form-select" id="floatingSelect" name="genre" value="{{$books->genre}}"
                        aria-label="Floating label select example">
                        <option selected>Pilih Genre</option>
                        <option value="comedy" {{ $books->genre == 'comedy' ? 'selected' : '' }}>Comedy</option>
                        <option value="romance" {{ $books->genre == 'romance' ? 'selected' : '' }}>Romance</option>
                        <option value="action" {{ $books->genre == 'action' ? 'selected' : '' }}>Action</option>
                        <option value="fantasy" {{ $books->genre == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
                        <option value="school" {{ $books->genre == 'school' ? 'selected' : '' }}>School</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Contoh : Ariel"
                        value="{{$books->author}}">
                </div>
                <div class="mb-3">
                    <label for="publication_year" class="form-label">Publication Year</label>
                    <input type="number" name="publication_year" class="form-control" id="author"
                        value="{{$books->publication_year}}" placeholder="Contoh : 2024">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Cover Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                    <p class="fs-6 text-muted">Path save on : /image/<em>{{$books->image}}</em></p>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Buku Baru</button>
            </form>
        </div>
    </div>

</div>
@endsection