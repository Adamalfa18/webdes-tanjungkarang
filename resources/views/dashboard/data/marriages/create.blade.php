@extends('dashboard.layouts.main')
@section('data_desa', 'active')
@section('perkawinan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Status Perkawinan</h1>
    </div>
    <div class="col-auto">
        <a href="/dashboard/data/marriages" class="btn btn-success mb-3">Kembali</a>
    </div>
    <div class="col-lg-4">
        <form method="post" action="/dashboard/data/marriages" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status"
                    name="status" required autofocus value="{{ old('status') }}">
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                    name="jumlah" required value="{{ old('jumlah') }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>
    <script></script>

@endsection
