@extends('layanan.layout.main')
@section('container')
    <section id="multiple-column-form">
        <div class="container">
            <div class="mb-3">
                <a href="/layanan/surat/surat_keterangan_pindah" class="btn btn-success"> <span
                        data-feather="arrow-left"></span> Kembali </a>
            </div>

            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h2>Surat Keterangan Pindah</h2>
                                <form class="form mb-5" method="post" action="/surat_keterangan_pindah"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="card-header">
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
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat_pindah" class="form-label">Alamat Pindah</label>
                                                <input placeholder="Alamat Pindah" type="text"
                                                    class="form-control @error('alamat_pindah') is-invalid @enderror"
                                                    id="alamat_pindah" name="alamat_pindah" required
                                                    value="{{ old('alamat_pindah') }}">
                                                @error('alamat_pindah')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alasan_pindah" class="form-label">Alasan Pindah</label>
                                                <input placeholder="Alasan Pindah" type="text"
                                                    class="form-control @error('alasan_pindah') is-invalid @enderror"
                                                    id="alasan_pindah" name="alasan_pindah" required
                                                    value="{{ old('alasan_pindah') }}">
                                                @error('alasan_pindah')
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
                                        <div class="col-md-6 col-12">
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
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="poto_kk" class="form-label">Foto Kartu Keluarga</label>
                                                <img class="img-preview  mb-3">
                                                <input class="form-control @error('poto_kk') is-invalid @enderror"
                                                    type="file" id="poto_kk" name="poto_kk" onchange="previewImage2()">
                                                @error('poto_kk')
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
