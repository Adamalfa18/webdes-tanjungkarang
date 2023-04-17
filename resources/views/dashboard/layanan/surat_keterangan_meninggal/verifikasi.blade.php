@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Verifikasi Surat Keterangan Meninggal </h1>
    </div>



    <div class="col-auto mt-3">
        <a href="/dashboard/layanan/surat_keterangan_meninggal" class="btn btn-success mb-3">Kembali</a>
        <a href="/dashboard/layanan/surat_keterangan_meninggal/{{ $skm->id }}/cetak-surat" class="btn btn-primary mb-3"
            target="_blank"><span data-feather="printer"></span>Cetak
            Surat</a>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post"
                                action="/dashboard/layanan/surat_keterangan_meninggal/{{ $skm->id }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div>
                                        <h4 class="card-title">Data Diri Pengaju</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_pengaju" class="form-label">Nama Pengaju</label>
                                            <input type="text"
                                                class="form-control @error('nama_pengaju') is-invalid @enderror"
                                                id="nama_pengaju" name="nama_pengaju" required disabled
                                                value="{{ old('nama_pengaju', $skm->data_penduduk->nama) }}">
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
                                                value="{{ old('nik', $skm->data_penduduk->nik) }}">
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
                                                value="{{ old('no_hp', $skm->data_penduduk->no_hp) }}">
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
                                                value="{{ old('jenis_kelamin', $skm->data_penduduk->genders->jenis) }}">
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
                                                value="{{ old('tanggal_lahir', $skm->data_penduduk->tanggal_lahir) }}">
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
                                                value="{{ old('agama', $skm->data_penduduk->religions->agama) }}">
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
                                                value="{{ old('pekerjaan', $skm->data_penduduk->professions->kelompok) }}">
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
                                                value="{{ old('pendidikan', $skm->data_penduduk->education->pendidikan) }}">
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
                                                value="{{ old('perkawinan', $skm->data_penduduk->marriages->status) }}">
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
                                                value="{{ old('warganegara', $skm->data_penduduk->warganegara->setatus) }}">
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
                                                value="{{ old('no_kk', $skm->data_penduduk->no_kk) }}">
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
                                                value="{{ old('alamat_pengaju', $skm->data_penduduk->alamat) }}">
                                            @error('alamat_pengaju')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Data Diri Orang Yang Meninggal</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama_alm" class="form-label">Nama</label>
                                            <input type="text"
                                                class="form-control @error('nama_alm') is-invalid @enderror"
                                                id="nama_alm" name="nama_alm" required disabled
                                                value="{{ old('nama_alm', $skm->nama_alm) }}">
                                            @error('nama_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nik_alm" class="form-label">Nik</label>
                                            <input type="text"
                                                class="form-control @error('nik_alm') is-invalid @enderror"
                                                id="nik_alm" name="nik_alm" required disabled
                                                value="{{ old('nik_alm', $skm->nik_alm) }}">
                                            @error('nik_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_kelamin_alm" class="form-label">Jenis Kelamin</label>
                                            <input type="text"
                                                class="form-control @error('jenis_kelamin_alm') is-invalid @enderror"
                                                id="jenis_kelamin_alm" name="jenis_kelamin_alm" required disabled
                                                value="{{ old('jenis_kelamin_alm', $skm->jenis_kelamin_alm) }}">
                                            @error('jenis_kelamin_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tanggal_lahir_alm" class="form-label">Tanggal Lahir</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_lahir_alm') is-invalid @enderror"
                                                id="tanggal_lahir_alm" name="tanggal_lahir_alm" required disabled
                                                value="{{ old('tanggal_lahir_alm', $skm->tanggal_lahir_alm) }}">
                                            @error('tanggal_lahir_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="warganegara_alm" class="form-label">Jenis Kelamin</label>
                                            <input type="text"
                                                class="form-control @error('warganegara_alm') is-invalid @enderror"
                                                id="warganegara_alm" name="warganegara_alm" required disabled
                                                value="{{ old('warganegara_alm', $skm->warganegara_alm) }}">
                                            @error('warganegara_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="agama_alm" class="form-label">Agama</label>
                                            <input type="text"
                                                class="form-control @error('agama_alm') is-invalid @enderror"
                                                id="agama_alm" name="agama_alm" required disabled
                                                value="{{ old('agama_alm', $skm->agama_alm) }}">
                                            @error('agama_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status_pernikahan_alm" class="form-label">Status
                                                Pernikahan</label>
                                            <input type="text"
                                                class="form-control @error('status_pernikahan_alm') is-invalid @enderror"
                                                id="status_pernikahan_alm" name="status_pernikahan_alm" required disabled
                                                value="{{ old('status_pernikahan_alm', $skm->status_pernikahan_alm) }}">
                                            @error('status_pernikahan_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pekerjaan_alm" class="form-label">Pekerjaan</label>
                                            <input type="text"
                                                class="form-control @error('pekerjaan_alm') is-invalid @enderror"
                                                id="pekerjaan_alm" name="pekerjaan_alm" required disabled
                                                value="{{ old('pekerjaan_alm', $skm->pekerjaan_alm) }}">
                                            @error('pekerjaan_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat_alm" class="form-label">Alamat</label>
                                            <input type="text"
                                                class="form-control @error('alamat_alm') is-invalid @enderror"
                                                id="alamat_alm" name="alamat_alm" required disabled
                                                value="{{ old('alamat_alm', $skm->alamat_alm) }}">
                                            @error('alamat_alm')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <h4 class="card-title">Telah Meninggal</h4>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tanggal_meninggal" class="form-label">Tanggal Meninggal</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_meninggal') is-invalid @enderror"
                                                id="tanggal_meninggal" name="tanggal_meninggal" required disabled
                                                value="{{ old('tanggal_meninggal', $skm->tanggal_meninggal) }}">
                                            @error('tanggal_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tempat_meninggal" class="form-label">Tempat Meninggal</label>
                                            <input type="text"
                                                class="form-control @error('tempat_meninggal') is-invalid @enderror"
                                                id="tempat_meninggal" name="tempat_meninggal" required disabled
                                                value="{{ old('tempat_meninggal', $skm->tempat_meninggal) }}">
                                            @error('tempat_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sebab_meninggal" class="form-label">Sebab Meninggal</label>
                                            <input type="text"
                                                class="form-control @error('sebab_meninggal') is-invalid @enderror"
                                                id="sebab_meninggal" name="sebab_meninggal" required disabled
                                                value="{{ old('sebab_meninggal', $skm->sebab_meninggal) }}">
                                            @error('sebab_meninggal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jam_meninggal" class="form-label">Jam</label>
                                            <input type="time"
                                                class="form-control @error('jam_meninggal') is-invalid @enderror"
                                                id="jam_meninggal" name="jam_meninggal" required disabled
                                                value="{{ old('jam_meninggal', $skm->jam_meninggal) }}">
                                            @error('jam_meninggal')
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
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="poto_ktp" class="form-label">Foto KTP</label>
                                            <input type="hidden" name="oldImage1"
                                                value="{{ old('jenis_usaha', $skm->poto_ktp) }}">
                                            @if ($skm->poto_ktp)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skm->poto_ktp) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto
                                                            KTP</button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image2" class="form-label">Foto Kartu Keluarga</label>
                                            <input type="hidden" name="oldImage2" value="{{ $skm->poto_kk }}">
                                            @if ($skm->poto_kk)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skm->poto_kk) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto
                                                            KK</button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label"> Status Layanan</label>
                                            <select class="form-select" name="status_layanan_id">
                                                @foreach ($status_layanan as $status)
                                                    @if (old('category_id', $skm->status_layanan_id) == $status->id)
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
