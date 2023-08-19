@extends('template')
@section('content')
    <div class="container">
        <h3 class="py-3">Buat Donasi Baru</h3>
        <form action="/donations/create" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="thumb" class="form-label">Thumbnail</label>
                <input type="file" name="thumb" class="form-control" id="thumb" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="tulis judul disini" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
