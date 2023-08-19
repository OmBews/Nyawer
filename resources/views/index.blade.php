@extends('template')
@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h2 class="py-5">Daftar yang bisa kamu sawer</h2>
            @forelse ($donations as $donation)
                <div class="col-md-4 mb-3">
                    <a href="/donations/detail/{{$donation->id}}" class="card text-decoration-none">
                        <img src="/storage/{{ $donation->thumb }}" class="card-img-top" style="height: 230px; object-fit: cover; object-position: top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $donation->title }}</h5>
                            <b>Dibuat oleh {{$donation->user->name}}</b>
                            <p class="card-text">{{ str()->limit($donation->desc, 120) }}</p>
                            <p class="card-text"><small class="text-body-secondary">Sawer terkumpul: Rp. {{number_format($donation->total)}}</small></p>
                        </div>
                    </a>
                </div>
            @empty
                <p>Belum ada yang perlu disawer</p>
            @endforelse
        </div>
    </div>
@endsection
