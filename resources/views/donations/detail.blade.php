@extends('template')
@section('content')
    <div class="container mt-4">
        <img src="/storage/{{ $donation->thumb }}" class="w-100 object-fit-cover rounded mb-3" style="height: 350px;"
            alt="...">
        <h2>{{ $donation->title }}</h2>
        <p><b>Dibuat oleh {{ $donation->user->name }}</b></p>
        <p class="text-primary mb-2">Saweran terkumpul: Rp {{ number_format($donation->total) }}</p>

        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Sawer!
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="/payments/{{$donation->id}}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Gasin Sawer Kang!!</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Nominal sawer</label>
                            <input type="number" class="form-control" name="amount" id="amount" placeholder="tulis nominal disini"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Sawer</button>
                    </div>
                </form>
            </div>
        </div>
        <p>{{ $donation->desc }}</p>
    </div>
@endsection
