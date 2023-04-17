@extends('dashboard.layouts.main')
@section('program-bantuan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Data Penerima Bantuan </h1>
    </div>

    <a href="/dashboard/programs/assistances" class="btn btn-primary mb-3">
        <span data-feather="arrow-left"></span>
        Kembali
    </a>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/dashboard/programs/assistances"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input placeholder="Nama Peneriam Bantuan" type="text"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" required autofocus value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nik" class="form-label">Nik</label>
                                            <input placeholder="No Induk Kependudukan" type="text"
                                                class="form-control @error('nik') is-invalid @enderror" id="nik" name="nik"
                                                required value="{{ old('nik') }}">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category" class="form-label">Nama Bantuan</label>
                                            <select class="form-select" name="program_id">
                                                @foreach ($program as $program)
                                                    @if (old('category_id') == $program->id)
                                                        <option value="{{ $program->id }}" selected>
                                                            {{ $program->name }}</option>
                                                    @else
                                                        <option value="{{ $program->id }}">{{ $program->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <input placeholder="alamat Penerima Bantuan" type="text"
                                                class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                                name="alamat" required autofocus value="{{ old('alamat') }}">
                                            @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
