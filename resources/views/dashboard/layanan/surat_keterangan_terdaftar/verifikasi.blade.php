@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Verifikasi Surat Keterangan Terdaftar </h1>
    </div>



    <div class="col-auto mt-3">
        <a href="/dashboard/layanan/surat_keterangan_terdaftar" class="btn btn-success mb-3">Kembali</a>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post"
                                action="/dashboard/layanan/surat_keterangan_terdaftar/{{ $skt->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div>
                                        <h4 class="card-title">Data Diri</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                            <input type="text"
                                                class="form-control @error('nama_pengaju') is-invalid @enderror"
                                                id="nama_pengaju" name="nama_pengaju" required disabled
                                                value="{{ old('nama_pengaju', $skt->data_penduduk->nama) }}">
                                            @error('nama_pengaju')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                                id="nik" name="nik" required disabled
                                                value="{{ old('nik', $skt->data_penduduk->nik) }}">
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_hp" class="form-label">No Hp</label>
                                            <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                                id="no_hp" name="no_hp" required disabled
                                                value="{{ old('no_hp', $skt->data_penduduk->no_hp) }}">
                                            @error('no_hp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                            <input type="text"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                id="jenis_kelamin" name="jenis_kelamin" required disabled
                                                value="{{ old('jenis_kelamin', $skt->data_penduduk->genders->jenis) }}">
                                            @error('jenis_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="tanggal_lahir" name="tanggal_lahir" required disabled
                                                value="{{ old('tanggal_lahir', $skt->data_penduduk->tanggal_lahir) }}">
                                            @error('tanggal_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="agama" class="form-label">Agama</label>
                                            <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                                id="agama" name="agama" required disabled
                                                value="{{ old('agama', $skt->data_penduduk->religions->agama) }}">
                                            @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                                name="pekerjaan" required disabled
                                                value="{{ old('pekerjaan', $skt->data_penduduk->professions->kelompok) }}">
                                            @error('pekerjaan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pendidikan" class="form-label">Pendidikan</label>
                                            <input type="text"
                                                class="form-control @error('pendidikan') is-invalid @enderror"
                                                id="pendidikan" name="pendidikan" required disabled
                                                value="{{ old('pendidikan', $skt->data_penduduk->education->pendidikan) }}">
                                            @error('pendidikan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="perkawinan" class="form-label">Status Perkawinan</label>
                                            <input type="text"
                                                class="form-control @error('perkawinan') is-invalid @enderror"
                                                id="perkawinan" name="perkawinan" required disabled
                                                value="{{ old('perkawinan', $skt->data_penduduk->marriages->status) }}">
                                            @error('perkawinan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="warganegara" class="form-label">warganegara</label>
                                            <input type="text"
                                                class="form-control @error('warganegara') is-invalid @enderror"
                                                id="warganegara" name="warganegara" required disabled
                                                value="{{ old('warganegara', $skt->data_penduduk->warganegara->setatus) }}">
                                            @error('warganegara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no_kk" class="form-label">No KK</label>
                                            <input type="text"
                                                class="form-control @error('no_kk') is-invalid @enderror" id="no_kk"
                                                name="no_kk" required disabled
                                                value="{{ old('no_kk', $skt->data_penduduk->no_kk) }}">
                                            @error('no_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat_pengaju" class="form-label">Alamat</label>
                                            <input type="text"
                                                class="form-control @error('alamat_pengaju') is-invalid @enderror"
                                                id="alamat_pengaju" name="alamat_pengaju" required disabled
                                                value="{{ old('alamat_pengaju', $skt->data_penduduk->alamat) }}">
                                            @error('alamat_pengaju')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Data Usaha</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="luas_tanah" class="form-label">Luas Tanah</label>
                                            <input type="text"
                                                class="form-control @error('luas_tanah') is-invalid @enderror"
                                                id="luas_tanah" name="luas_tanah" required disabled
                                                value="{{ old('luas_tanah', $skt->luas_tanah) }}">
                                            @error('luas_tanah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status_tanah" class="form-label">Status Tanah</label>
                                            <input type="text"
                                                class="form-control @error('status_tanah') is-invalid @enderror"
                                                id="status_tanah" name="status_tanah" required disabled
                                                value="{{ old('status_tanah', $skt->status_tanah) }}">
                                            @error('status_tanah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="kepentingan" class="form-label">Kepentingan</label>
                                            <input type="text"
                                                class="form-control @error('kepentingan') is-invalid @enderror"
                                                id="kepentingan" name="kepentingan" required disabled
                                                value="{{ old('kepentingan', $skt->kepentingan) }}">
                                            @error('kepentingan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="letak_tanah" class="form-label">Letak Tanah</label>
                                            <input type="text"
                                                class="form-control @error('letak_tanah') is-invalid @enderror"
                                                id="letak_tanah" name="letak_tanah" required disabled
                                                value="{{ old('letak_tanah', $skt->letak_tanah) }}">
                                            @error('letak_tanah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Batas Tanah</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="batas_utara" class="form-label">Batas Utara</label>
                                            <input type="text"
                                                class="form-control @error('batas_utara') is-invalid @enderror"
                                                id="batas_utara" name="batas_utara" required disabled
                                                value="{{ old('batas_utara', $skt->batas_utara) }}">
                                            @error('batas_utara')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="batas_selatan" class="form-label">Batas Selatan</label>
                                            <input type="text"
                                                class="form-control @error('batas_selatan') is-invalid @enderror"
                                                id="batas_selatan" name="batas_selatan" required disabled
                                                value="{{ old('batas_selatan', $skt->batas_selatan) }}">
                                            @error('batas_selatan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="batas_timur" class="form-label">Batas Selatan</label>
                                            <input type="text"
                                                class="form-control @error('batas_timur') is-invalid @enderror"
                                                id="batas_timur" name="batas_timur" required disabled
                                                value="{{ old('batas_timur', $skt->batas_timur) }}">
                                            @error('batas_timur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="batas_barat" class="form-label">Batas Selatan</label>
                                            <input type="text"
                                                class="form-control @error('batas_barat') is-invalid @enderror"
                                                id="batas_barat" name="batas_barat" required disabled
                                                value="{{ old('batas_barat', $skt->batas_barat) }}">
                                            @error('batas_barat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div>
                                    <h4 class="card-title">Dokumen Persaratan</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_ktp" class="form-label">Foto KTP</label>
                                            <div>
                                                @if ($skt->poto_ktp)
                                                    <a href="{{ asset('storage/' . $skt->poto_ktp) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek KTP</button>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="image2" class="form-label">Foto Kartu Keluarga</label>
                                            <div>
                                                @if ($skt->poto_kk)
                                                    <a href="{{ asset('storage/' . $skt->poto_kk) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek SPPT</button>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_sppt" class="form-label">Foto SPPT</label>
                                            <div>
                                                @if ($skt->poto_sppt)
                                                    <a href="{{ asset('storage/' . $skt->poto_sppt) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek SPPT</button>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label"> Status Layanan</label>
                                            <select class="form-select" name="status_layanan_id">
                                                @foreach ($status_layanan as $status)
                                                    @if (old('category_id', $skt->status_layanan_id) == $status->id)
                                                        <option value="{{ $status->id }}" selected>
                                                            {{ $status->status }}</option>
                                                    @else
                                                        <option value="{{ $status->id }}">{{ $status->status }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Verifikasi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
