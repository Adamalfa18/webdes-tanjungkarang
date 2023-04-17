@extends('layouts.main')

@section('container')
    @include('partials.header')
    {{-- Login Layanan --}}
    <div class="mt-4">
        @if (session()->has('success'))
            <div class="container">

                <div class="alert alert-success col-lg-auto" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="page2">
        <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
            <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-xl-start">
                <div class="mb-4 mb-xl-0">
                    <div class="fs-3 fw-bold text-white">Login Layanan.</div>
                    <div class="text-white-50 mb-4">Untuk melakukan pelayan silahkan hunbungi kami<br> melalui whass app
                        untuk
                        mendapatkan nik dan pin</div>
                    <div class="text-white-50">Untuk melakukan pelayan silahkan melakukan pendaftaran bagi yang belum
                        mempunyai akun!</div>
                </div>
                <div class="ms-xl-4">
                    <form action="/login_layanan" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="integer" name="nik" class="form-control form-control-xl" id="nik"
                                placeholder="Nik" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" id="password"
                                placeholder="Password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="w-100 btn btn-lg btn-outline-light">Log in</button>
                    </form>
                    <div class="text-center mt-3">
                        <span class="text-white"> Anda belum punya akun ?</span>
                        <a class="text-white" href="/register"><b>Daftar Sekarang</b></a>
                    </div>
                </div>
            </div>
        </aside>
    </div>
    {{-- end --}}

    {{-- Data Desa --}}
    <div class="page1">
        <div class="page-heading">
            <h3>Statistik Desa</h3>
            <p>Berikut Adalah Statistik Demografi Desa Kami</p>
        </div>
        <div class="page-content">
            <section class="row">
                <div class="col-md-12">
                    <div class="row statistik">
                        <div class="col-lg-2 col-md-12">
                            <a href="data#list-item-2">
                                <div class="card card-position card-color card-utama card-utama">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <div class="stats-icon purple">
                                                        <i class="bi-mortarboard-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-center font-semibold">Pendidikan</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-2 col-md-12">
                            <a href="/data#list-item-1">
                                <div class="card card-position card-color card-utama">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <div class="stats-icon purple">
                                                        <i class="bi-briefcase-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-center font-semibold">Pekerjaan</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-2 col-md-12">
                            <a href="/data#list-item-4">
                                <div class="card card-position card-color card-utama">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <div class="stats-icon icon blue">
                                                        <i class="bi-gender-ambiguous"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text- font-semibold">Jenis kelamin</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-2 col-md-12">
                            <a href="/data#list-item-5">
                                <div class="card card-position card-color card-utama"">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <div class="stats-icon green">
                                                        <i class="bi-heart-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-center font-semibold">Pernikahan</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=" col-lg-2 col-md-12">
                            <a href="/data#list-item-3">
                                <div class="card card-position card-color card-utama"">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row justify-content-center">
                                                    <div class="stats-icon red">
                                                        <i class="bi-moon-stars-fill"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-center font-semibold">Agama</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- end --}}


    {{-- Berita Desa --}}
    <div class="page2">
        <div>
            <h4>Berita Desa</h4>
            <p>Berikut adalah berita desa Tanjungkarang</p>
        </div>
        <div class="row">
            <a href="/berita">
                <p style="text-align: right">Tampil Semua</p>
            </a>
            <!-- Blog entries-->
            <div class="col-lg-12">
                <!-- Featured blog post-->
                <div class="card col-md-4 mb-4">
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-lg-4">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0,0.7)">
                                    <a href="berita/?category={{ $post->category->slug }}"
                                        class="text-white text-decoration-none">
                                        {{ $post->category->name }}</a>
                                </div>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid">
                                @else
                                    <img src="https://source.unsplash.com/700x350?{{ $post->category->name }}"
                                        class="card-img-top" alt="{{ $post->category->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p>
                                        <small class="text-muted">
                                            by. <a href="/berita?author={{ $post->author->username }}"
                                                class="text-decoration-none">{{ $post->author->name }}</a>
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </p>
                                    <p class="card-text"> {{ $post->excerpt }} </p>
                                    <a class="btn btn-primary" href="/berita/{{ $post->slug }}">Baca Sekarang →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}


    {{-- Pengaduan --}}

    <div class="page2">
        <h3 class="text-position">Ajukan Pengadauan</h3>
        <p class="text-center">Layanan ini digunakan untuk masyarakat desa Tanjungkarang apabila ada keluhan kepada desa !
        </p>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="col-md-12">
                    <form class="form mb-5" method="post" action="/pengaduan">
                        @csrf
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="nama" class="form-label">Nama Pengaju</label>
                                <input placeholder="Nama Pengaju" type="text"
                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                    name="nama" required value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input placeholder="Nama Pengaju" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                    name="alamat" required value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="prihal" class="form-label">Perihal</label>
                                <input placeholder="Nama Pengaju" type="text"
                                    class="form-control @error('prihal') is-invalid @enderror" id="prihal"
                                    name="prihal" required value="{{ old('prihal') }}">
                                @error('prihal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="pesan" class="form-label">Pesan</label>
                                <input rows="3" placeholder="Nama Pengaju" type="text"
                                    class="form-control @error('pesan') is-invalid @enderror" id="pesan"
                                    name="pesan" required value="{{ old('pesan') }}">

                                @error('pesan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End --}}
@endsection
