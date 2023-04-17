@extends('layouts.main')
@section('container')
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-header">
                <div class="footer-logo">
                    <a href="/"><img src="{{ asset('/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Akun Anda Belum Terverifikasi</h5>
                <p class="card-text">silahkan hubungi admin Desa Tanjungkarang, Ciigalontang - Tasikmalaya</p>
                <a href="whatsapp://send?text=Min akun saya belum terverifikasi&phone=+6282258577873"
                    class="btn btn-outline-primary mx-3">hubungi
                    Admin</a>
                <a href="login_layanan" class="btn btn-primary">Login Kembali</a>

            </div>

        </div>
    </div>
@endsection
