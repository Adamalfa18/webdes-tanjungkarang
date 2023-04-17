@extends('dashboard.layouts.main')
@section('data_desa', 'active')
@section('agama', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Agama</h1>
    </div>
    <div>
        <a href="/dashboard/data/religions" class="btn btn-success mb-3">Kembali</a>
    </div>
    <div class="col-lg-4">
        <form method="post" action="/dashboard/data/religions" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <input type="text" class="form-control @error('agama') is-invalid @enderror" id="agama"
                    name="agama" required autofocus value="{{ old('agama') }}">
                @error('agama')
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
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
    <script></script>

@endsection
