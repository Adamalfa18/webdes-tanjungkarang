@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Surat Keterangan Domisili</h1>
    </div>



    <div class="col-auto mt-3">
        <a href="/dashboard/layanan/surat_keterangan_domisili" class="btn btn-success mb-3">Kembali</a>
    </div>
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post"
                                action="/dashboard/layanan/surat_keterangan_domisili/{{ $skd->id }}"
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
                                                    @if (old('data_penduduk_id', $skd->data_penduduk_id) == $penduduk->id)
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
                                            <label for="prihal" class="form-label">Prihal</label>
                                            <input type="text" class="form-control @error('prihal') is-invalid @enderror"
                                                id="prihal" name="prihal" required
                                                value="{{ old('prihal', $skd->prihal) }}">
                                            @error('prihal')
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
                                                value="{{ old('jenis_usaha', $skd->poto_ktp) }}">
                                            @if ($skd->poto_ktp)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skd->poto_ktp) }}" target="_blank">
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
                                            <input type="hidden" name="oldImage2" value="{{ $skd->poto_kk }}">
                                            @if ($skd->poto_kk)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skd->poto_kk) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek Foto KK</button>
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
