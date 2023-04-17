@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Verifikasi Surat Keterangan Usaha </h1>
    </div>


    <div class="row">
        <div class="col-auto mt-3">
            <a href="/dashboard/layanan/surat_keterangan_usaha" class="btn btn-success mb-3">Kembali</a>
            <a href="/dashboard/layanan/surat_keterangan_usaha/{{ $sku->id }}/cetak-surat" class="btn btn-primary mb-3"
                target="_blank"><span data-feather="printer"></span>Cetak
                Surat</a>
        </div>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post"
                                action="/dashboard/layanan/surat_keterangan_usaha/{{ $sku->id }}"
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
                                                value="{{ old('nama_pengaju', $sku->data_penduduk->nama) }}">
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
                                                value="{{ old('nik', $sku->data_penduduk->nik) }}">
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
                                                value="{{ old('no_hp', $sku->data_penduduk->no_hp) }}">
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
                                                value="{{ old('jenis_kelamin', $sku->data_penduduk->genders->jenis) }}">
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
                                                value="{{ old('tanggal_lahir', $sku->data_penduduk->tanggal_lahir) }}">
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
                                                value="{{ old('agama', $sku->data_penduduk->religions->agama) }}">
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
                                                value="{{ old('pekerjaan', $sku->data_penduduk->professions->kelompok) }}">
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
                                                value="{{ old('pendidikan', $sku->data_penduduk->education->pendidikan) }}">
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
                                                value="{{ old('perkawinan', $sku->data_penduduk->marriages->status) }}">
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
                                                value="{{ old('warganegara', $sku->data_penduduk->warganegara->setatus) }}">
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
                                                value="{{ old('no_kk', $sku->data_penduduk->no_kk) }}">
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
                                                value="{{ old('alamat_pengaju', $sku->data_penduduk->alamat) }}">
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
                                            <label for="nama_usaha" class="form-label">Nama Usaha</label>
                                            <input type="text"
                                                class="form-control @error('nama_usaha') is-invalid @enderror"
                                                id="nama_usaha" name="nama_usaha" required disabled
                                                value="{{ old('nama_usaha', $sku->nama_usaha) }}">
                                            @error('nama_usaha')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jenis_usaha" class="form-label">Jenis Usaha</label>
                                            <input type="text"
                                                class="form-control @error('jenis_usaha') is-invalid @enderror"
                                                id="jenis_usaha" name="jenis_usaha" required disabled
                                                value="{{ old('jenis_usaha', $sku->jenis_usaha) }}">
                                            @error('jenis_usaha')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="alamat_usaha" class="form-label">Alamat Usaha</label>
                                            <input type="text"
                                                class="form-control @error('alamat_usaha') is-invalid @enderror"
                                                id="alamat_usaha" name="alamat_usaha" required disabled
                                                value="{{ old('alamat_usaha', $sku->alamat_usaha) }}">
                                            @error('alamat_usaha')
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
                                                id="prihal" kepentingan name="kepentingan" required disabled
                                                value="{{ old('kepentingan', $sku->kepentingan) }}">
                                            @error('kepentingan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div>
                                    <h4 class="card-title">Dokumen</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_ktp" class="form-label">Foto KTP</label>
                                            <input type="hidden" name="oldImage1"
                                                value="{{ old('jenis_usaha', $sku->poto_ktp) }}">
                                            @if ($sku->poto_ktp)
                                                <div>
                                                    <a href="{{ asset('storage/' . $sku->poto_ktp) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto
                                                            KTP</button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="image2" class="form-label">Foto Kartu Keluarga</label>
                                            <input type="hidden" name="oldImage2" value="{{ $sku->poto_kk }}">
                                            @if ($sku->poto_kk)
                                                <div>
                                                    <a href="{{ asset('storage/' . $sku->poto_kk) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto
                                                            KK</button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_usaha" class="form-label">Foto Usaha</label>
                                            <input type="hidden" name="oldImage3" value="{{ $sku->poto_usaha }}">
                                            @if ($sku->poto_usaha)
                                                <div>
                                                    <a href="{{ asset('storage/' . $sku->poto_usaha) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto
                                                            Usaha</button>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label"> Status Layanan</label>
                                            <select class="form-select" name="status_layanan_id">
                                                @foreach ($status_layanan as $status)
                                                    @if (old('category_id', $sku->status_layanan_id) == $status->id)
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
