@extends('layanan.layout.main')
@section('container')
    <section id="multiple-column-form">
        <div class="container">
            <div class="container">
                <div class="mb-3">
                    <a href="/layanan/surat/surat_keterangan_terdaftar" class="btn btn-success"> <span
                            data-feather="arrow-left"></span> Kembali </a>
                </div>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h2>Surat Keterangan Terdaftar/Tanah</h2>
                                        <form class="form mb-5" method="post" action="/surat_keterangan_terdaftar"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div>
                                                    <h4 class="card-title">Form pembuatan surat</h4>
                                                </div>
                                                <div class="search_box">
                                                    <div class="form-group">
                                                        <label for="data_penduduk" class="form-label">Data Pengaju</label>
                                                        <select data-live-search="true"
                                                            class="form-select ukuran-select  @error('data_penduduk_id') is-invalid @enderror"
                                                            name="data_penduduk_id">
                                                            @foreach ($data_penduduk as $penduduk)
                                                                @if (old('data_penduduk_id') == $penduduk->id)
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
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="kepentingan" class="form-label">Kepentingan</label>
                                                        <input placeholder="Kepentingan" type="text"
                                                            class="form-control @error('kepentingan') is-invalid @enderror"
                                                            id="kepentingan" name="kepentingan" required
                                                            value="{{ old('kepentingan') }}">
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
                                                        <input
                                                            placeholder="(Jalan, RT/RW, Kelurahan/Desa, Kecamatan, Kab/Kota, KodePos)"
                                                            type="text"
                                                            class="form-control @error('letak_tanah') is-invalid @enderror"
                                                            id="letak_tanah" name="letak_tanah" required
                                                            value="{{ old('letak_tanah') }}">
                                                        @error('letak_tanah')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="luas_tanah" class="form-label">Luas Tanah</label>
                                                        <input placeholder="Luas Tanah" type="text"
                                                            class="form-control @error('luas_tanah') is-invalid @enderror"
                                                            id="luas_tanah" name="luas_tanah" required autofocus
                                                            value="{{ old('luas_tanah') }}">
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
                                                        <input placeholder="Hak Milik, Leter C, Dll" type="text"
                                                            class="form-control @error('status_tanah') is-invalid @enderror"
                                                            id="status_tanah" name="status_tanah" required autofocus
                                                            value="{{ old('status_tanah') }}">
                                                        @error('status_tanah')
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
                                                        <label for="batas_utara" class="form-label">Batas Tanah
                                                            Utara</label>
                                                        <input placeholder="Perbatasan Utara" type="text"
                                                            class="form-control @error('batas_utara') is-invalid @enderror"
                                                            id="batas_utara" name="batas_utara" required autofocus
                                                            value="{{ old('batas_utara') }}">
                                                        @error('batas_utara')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="batas_selatan" class="form-label">Batas Tanah
                                                            Selatan</label>
                                                        <input placeholder="Perbatasan Selatan" type="text"
                                                            class="form-control @error('batas_selatan') is-invalid @enderror"
                                                            id="batas_selatan" name="batas_selatan" required autofocus
                                                            value="{{ old('batas_selatan') }}">
                                                        @error('batas_selatan')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="batas_timur" class="form-label">Batas Tanah
                                                            Timur</label>
                                                        <input placeholder="Perbatasan Timur" type="text"
                                                            class="form-control @error('batas_timur') is-invalid @enderror"
                                                            id="batas_timur" name="batas_timur" required autofocus
                                                            value="{{ old('batas_timur') }}">
                                                        @error('batas_timur')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="batas_barat" class="form-label">Batas Tanah
                                                            Barat</label>
                                                        <input placeholder="Perbatasan Barat" type="text"
                                                            class="form-control @error('batas_barat') is-invalid @enderror"
                                                            id="batas_barat" name="batas_barat" required autofocus
                                                            value="{{ old('batas_barat') }}">
                                                        @error('batas_barat')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="card-title">Dokumen Persyaratan</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="poto_ktp" class="form-label">Foto Ktp</label>
                                                        <img class="img-preview  mb-3">
                                                        <input class="form-control @error('poto_ktp') is-invalid @enderror"
                                                            type="file" id="poto_ktp" name="poto_ktp"
                                                            onchange="previewImage1()">
                                                        @error('poto_ktp')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="poto_kk" class="form-label">Foto Kartu
                                                            Keluarga</label>
                                                        <img class="img-preview  mb-3">
                                                        <input class="form-control @error('poto_kk') is-invalid @enderror"
                                                            type="file" id="poto_kk" name="poto_kk"
                                                            onchange="previewImage2()">
                                                        @error('poto_kk')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="poto_sppt" class="form-label">Foto Sppt</label>
                                                        <img class="img-preview  mb-3">
                                                        <input
                                                            class="form-control @error('poto_sppt') is-invalid @enderror"
                                                            type="file" id="poto_sppt" name="poto_sppt"
                                                            onchange="previewImage3()">
                                                        @error('poto_sppt')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                    </form>
                                </div>
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
            const image = document.querySelector('#poto_sppt');
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
