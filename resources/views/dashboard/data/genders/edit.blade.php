@extends('dashboard.layouts.main')
@section('data_desa', 'active')
@section('jenis', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Jenis Kelamin</h1>
    </div>
    <div class="col-auto">
        <a href="/dashboard/data/genders" class="btn btn-success mb-3">Kembali</a>
    </div>
    <div class="col-lg-8">
        <form method="post" action="/dashboard/data/genders/{{ $gender->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis"
                    name="jenis" required autofocus value="{{ old('jenis', $gender->jenis) }}">
                @error('jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                    name="jumlah" required value="{{ old('jumlah', $gender->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>

    <script></script>

@endsection
