@extends('layanan.layout.main')
@section('container')
    <div class="container">
        <div class="page-heading lg-6">
        </div>
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class=" col-lg-6 mt-3">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ asset('images/faces/1.jpg') }}" alt="Face 1">
                                        <div class="ms-3">
                                            <h5 class="font-bold mt-2">{{ auth()->user()->username }}</h5>
                                            <h6 class="text-start">NIK : {{ auth()->user()->nik }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-6 mt-3 mb-3">
                            <div class="col-md-4">
                                <div class="row justify-content-end">
                                    <div>
                                        <a href="/layanan/ubah_password/{{ auth()->user()->id }}/edit"
                                            class="posisi-btn btn btn-primary mb-3">
                                            Edit Password
                                            <span data-feather="key"></span></a>
                                    </div>
                                    <div>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="btn posisi-btn btn-outline-danger"> Logout <span
                                                    data-feather="log-out"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>Layanan Pengajuan Surat</h2>
                <h6>Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
                <div class="row mt-3">
                    @foreach ($layanan as $layanan)
                        <div class=" col-lg-6 col-md-12">
                            <a href="layanan/surat/{{ $layanan->kategori }}">
                                <div class="card card-position card-color card-utama">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row statistik">
                                            <div class="col-md-4">
                                                <div class="row align-items-center">
                                                    <h6 class="text-black font-semibold">
                                                        <img
                                                            src="{{ asset('images/layanan/' . $layanan['kategori'] . '.svg') }}">
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <h6 class="text-center text-black font-semibold">
                                                    {{ $layanan->nama_layanan }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            </section>
        </div>
    @endsection
