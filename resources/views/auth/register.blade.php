@extends('template')
@section('content')
    <div class="container">
        <main class="text-center border p-4 mt-5 rounded">
            <form method="POST" action="/register">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Ayo Buat Akun</h1>

                <div class="form-floating mb-2">
                    <input type="text" name="name" class="form-control" id="name" placeholder="sigit">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Buat akun</button>
                <a href="/login" class="d-block mt-3 mb-2 text-muted">Sudah punya akun?</a>
            </form>
        </main>
    </div>
@endsection
