@extends('dashboard.layouts.main')
@section('data_penduduk', 'active')
@section('data_penduduk', 'active')
@section('container')

    <div class="col-auto">
        <a href="/dashboard/aparatur" class="btn btn-success mb-3">Kembali</a>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form method="post" action="/dashboard/data-penduduk/{{ $penduduk->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="nik" class="form-label mt-3">NIK</label>
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                            id="nik" name="nik" required autofocus
                                            value="{{ old('nik', $penduduk->nik) }}">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="nama" class="form-label mt-3">Nama</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                            id="nama" name="nama" required
                                            value="{{ old('nama', $penduduk->nama) }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="no_kk" class="form-label mt-3">No KK</label>
                                        <input type="number" class="form-control @error('no_kk') is-invalid @enderror"
                                            id="no_kk" name="no_kk" required
                                            value="{{ old('no_kk', $penduduk->no_kk) }}">
                                        @error('no_kk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="no_hp" class="form-label mt-3">No HP</label>
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" required
                                            value="{{ old('no_hp', $penduduk->no_hp) }}">
                                        @error('no_hp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="alamat" class="form-label mt-3">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" required
                                            value="{{ old('alamat', $penduduk->alamat) }}">
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="tanggal_lahir" class="form-label mt-3">Tanggal Lahir</label>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            id="tanggal_lahir" name="tanggal_lahir" required
                                            value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="pendidikan" class="form-label mt-3">Pendidikan</label>
                                        <select class="form-select" name="education_id">
                                            @foreach ($pendidikan as $pendidikan)
                                                @if (old('education_id', $penduduk->education_id) == $pendidikan->id)
                                                    <option value="{{ $pendidikan->id }}" selected>
                                                        {{ $pendidikan->pendidikan }}</option>
                                                @else
                                                    <option value="{{ $pendidikan->id }}">
                                                        {{ $pendidikan->pendidikan }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="pekerjaan" class="form-label mt-3">Pekerjaan</label>
                                        <select class="form-select" name="professions_id">
                                            @foreach ($pekerjaan as $pekerjaan)
                                                @if (old('professions_id', $penduduk->professions_id) == $pekerjaan->id)
                                                    <option value="{{ $pekerjaan->id }}" selected>
                                                        {{ $pekerjaan->kelompok }}</option>
                                                @else
                                                    <option value="{{ $pekerjaan->id }}">
                                                        {{ $pekerjaan->kelompok }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="agama" class="form-label mt-3">Agama</label>
                                        <select class="form-select" name="religions_id">
                                            @foreach ($agama as $agama)
                                                @if (old('religions_id', $penduduk->religions_id) == $agama->id)
                                                    <option value="{{ $agama->id }}" selected>
                                                        {{ $agama->agama }}</option>
                                                @else
                                                    <option value="{{ $agama->id }}">
                                                        {{ $agama->agama }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="perkawinan" class="form-label mt-3">Status Perkawinan</label>
                                        <select class="form-select" name="marriages_id">
                                            @foreach ($perkawinan as $perkawinan)
                                                @if (old('marriages_id', $penduduk->marriages_id) == $perkawinan->id)
                                                    <option value="{{ $perkawinan->id }}" selected>
                                                        {{ $perkawinan->status }}</option>
                                                @else
                                                    <option value="{{ $perkawinan->id }}">
                                                        {{ $perkawinan->status }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="pekerjaan" class="form-label mt-3">Agama</label>
                                        <select class="form-select" name="genders_id">
                                            @foreach ($jenis_kelamin as $kelamin)
                                                @if (old('genders_id', $penduduk->genders_id) == $kelamin->id)
                                                    <option value="{{ $kelamin->id }}" selected>
                                                        {{ $kelamin->jenis }}</option>
                                                @else
                                                    <option value="{{ $kelamin->id }}">
                                                        {{ $kelamin->jenis }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="warganegara" class="form-label mt-3">Warganegara</label>
                                        <select class="form-select" name="warganegara_id">
                                            @foreach ($warganegara as $warganegara)
                                                @if (old('warganegara_id', $penduduk->warganegara_id) == $warganegara->id)
                                                    <option value="{{ $warganegara->id }}" selected>
                                                        {{ $warganegara->setatus }}</option>
                                                @else
                                                    <option value="{{ $warganegara->id }}">
                                                        {{ $warganegara->setatus }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
