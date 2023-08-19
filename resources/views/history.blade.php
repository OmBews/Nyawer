@extends('template')
@section('content')
    <div class="container">
        <h2 class="py-5">Riwayat penyaweranmu</h2>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Donasi Ke</th>
                    <th scope="col">Status</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($payments as $payment)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>Rp. {{number_format($payment->amount)}}</td>
                        <td>{{$payment->donation->title}}</td>
                        <td>{{$payment->status}}</td>
                        <td>{{$payment->payment_channel}}</td>
                        <td>{{$payment->description}}</td>
                        <td><a href="{{$payment->checkout_link}}" target="_blank">Lihat bukti</a></td>
                    </tr>
                @empty
                    <p>Kamu belum menyawer sama sekali!</p>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
