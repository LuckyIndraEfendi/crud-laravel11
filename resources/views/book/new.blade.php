<x-app-layout>

    <div class="container mt-5 mb-5">
        <h1 class="fs-2 mb-5">Tambah Buku Baru</h1>
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('book.submitNewBook') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="title" class="form-label">Judul Buku</label>
                        <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp"
                            placeholder="Contoh : Buku Megawati">
                    </div>
                    <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" name="isbn" class="form-control" id="isbn" placeholder="Contoh : 13138237">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" id="isbn" style="resize: none;"
                            placeholder="Contoh : Halo Ini adalah..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre Buku</label>
                        <select class="form-select" id="floatingSelect" name="genre"
                            aria-label="Floating label select example">
                            <option selected>Pilih Genre</option>
                            <option value="comedy">Comedy</option>
                            <option value="romance">Romance</option>
                            <option value="action">Action</option>
                            <option value="fantasy">Fantasy</option>
                            <option value="school">School</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" class="form-control" id="author" placeholder="Contoh : Ariel">
                    </div>
                    <div class="mb-3">
                        <label for="publication_year" class="form-label">Publication Year</label>
                        <input type="number" name="publication_year" class="form-control" id="author"
                            placeholder="Contoh : 2024">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Cover Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Buku Baru</button>
                    <a href="/" class="btn btn-danger">Kembali</a>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>