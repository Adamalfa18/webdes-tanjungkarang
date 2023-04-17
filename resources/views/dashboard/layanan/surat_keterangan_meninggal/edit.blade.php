@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Surat Keterangan Meninggal </h1>
    </div>



    <div class="col-auto mt-3">
        <a href="/dashboard/layanan/surat_keterangan_meninggal" class="btn btn-success mb-3">Kembali</a>
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
                                @method('put')
                                @csrf
                                <div class="row">
                                    <div>
                                        <h4 class="card-title">Form Pengajuan</h4>
                                    </div>
                                    <div class="search_box">
                                        <div class="form-group">
                                            <label for="data_penduduk" class="form-label">Data Pengaju</label>
                                            <select data-live-search="true"
                                                class="form-select ukuran-select  @error('data_penduduk_id') is-invalid @enderror"
                                                name="data_penduduk_id">
                                                <option></option>
                                                @foreach ($data_penduduk as $penduduk)
                                                    @if (old('data_penduduk_id', $skm->data_penduduk_id) == $penduduk->id)
                                                        <option value="{{ $penduduk->id }}" selected>
                                                            {{ $penduduk->nama }}-{{ $penduduk->nik }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $penduduk->id }}">
                                                            {{ $penduduk->nama }}-{{ $penduduk->nik }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('data_penduduk_id')
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
                                                class="form-control @error('nama_alm') is-invalid @enderror" id="nama_alm"
                                                name="nama_alm" required autofocus
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
                                                class="form-control @error('nik_alm') is-invalid @enderror" id="nik_alm"
                                                name="nik_alm" required autofocus
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
                                                id="jenis_kelamin_alm" name="jenis_kelamin_alm" required
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
                                                id="tanggal_lahir_alm" name="tanggal_lahir_alm" required
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
                                                id="warganegara_alm" name="warganegara_alm" required
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
                                                class="form-control @error('agama_alm') is-invalid @enderror" id="agama_alm"
                                                name="agama_alm" required value="{{ old('agama_alm', $skm->agama_alm) }}">
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
                                                id="status_pernikahan_alm" name="status_pernikahan_alm" required
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
                                                id="pekerjaan_alm" name="pekerjaan_alm" required
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
                                                id="alamat_alm" name="alamat_alm" required
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
                                                id="tanggal_meninggal" name="tanggal_meninggal" required
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
                                                id="tempat_meninggal" name="tempat_meninggal" required
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
                                                id="sebab_meninggal" name="sebab_meninggal" required
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
                                                id="jam_meninggal" name="jam_meninggal" required
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
                                            <label for="poto_ktp" class="form-label">Ubah Foto KTP</label>
                                            <input class="form-control @error('poto_ktp') is-invalid @enderror"
                                                type="file" id="poto_ktp" name="poto_ktp" onchange="previewImage()">
                                            @error('poto_ktp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
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
                                            <label for="image2" class="form-label">Ubah Foto Kartu Keluarga</label>
                                            <input class="form-control @error('poto_kk') is-invalid @enderror"
                                                type="file" id="poto_kk" name="poto_kk" onchange="previewImage()">
                                            @error('poto_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function previewImage() {
            const image = document.querySelector('#poto_ktp');
            const image = document.querySelector('#poto_kk');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
