@extends('dashboard.layouts.main')
@section('dashboard', 'active')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <section class="row">

        <div class="col-12 col-lg-12">
            <div class="row">
                {{-- Mading Desa --}}
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Mading Desa</h4>
                            <div class="col-auto">
                                <a href="/dashboard/mading_desa/create" class="posisi btn btn-primary mb-3">Tambah Mading
                                    Desa</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-lg" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mading_desa as $mading)
                                            <tr>
                                                <td class="col-md-4 col-12">
                                                    <div class="d-flex align-items-center">
                                                        <div style="max-height: 150px; overflow:hidden;">
                                                            <img src="{{ asset('storage/' . $mading->image) }}"
                                                                alt="{{ $mading->name }}" class="aparaturs"
                                                                style="max-height: 150px;">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0">{{ $mading->judul }}</p>
                                                    </div>
                                                </td>
                                                <td class="col-3">
                                                    <p class=" mb-0">{{ $mading->deskripsi }}</p>
                                                </td>
                                                <td>
                                                    <a href="/dashboard/mading_desa/{{ $mading->id }}/edit"
                                                        class="badge bg-warning"><span data-feather="edit"></span></a>
                                                    <form action="/dashboard/mading_desa/{{ $mading->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0"
                                                            onclick="return confirm('Apakah anda yakin?')"><span
                                                                data-feather="x-circle"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Penagaduan</h4>
                        </div>
                        <div class="col-auto p-4">
                            <a href="/dashboard/cetak" class="btn btn-primary" target="_blank"><span
                                    data-feather="printer"></span>
                                Cetak</a>
                            <i class="bi bi-file-pdf"></i>
                            <a href="/dashboard/cetak_pdf" class="btn btn-primary" target="_blank"><span
                                    data-feather="file-text"></span>
                                Pdf</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-lg">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Perihal</th>
                                            <th>Pesan</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengaduan as $pengaduan)
                                            <tr>
                                                <td class="col-3">
                                                    <div class="d-flex align-items-center">
                                                        <p class="font-bold ms-3 mb-0">{{ $pengaduan->nama }}</p>
                                                    </div>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">{{ $pengaduan->prihal }}</p>
                                                </td>
                                                <td class="col-auto">
                                                    <p class=" mb-0">{{ $pengaduan->pesan }}</p>
                                                </td>
                                                <td>
                                                    <form action="/dashboard/pengaduan/{{ $pengaduan->id }}" method="post"
                                                        class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0"
                                                            onclick="return confirm('Apakah anda yakin?')"><span
                                                                data-feather="x-circle"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
