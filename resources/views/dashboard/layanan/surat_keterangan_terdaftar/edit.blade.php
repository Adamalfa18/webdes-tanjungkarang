@extends('dashboard.layouts.main')
@section('layanan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Surat Keterangan Terdaftar </h1>
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
                                                    @if (old('data_penduduk_id', $skt->data_penduduk_id) == $penduduk->id)
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
                                            <label for="luas_tanah" class="form-label">Luas Tanah</label>
                                            <input type="text"
                                                class="form-control @error('luas_tanah') is-invalid @enderror"
                                                id="luas_tanah" name="luas_tanah" required autofocus
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
                                            <label for="batas_timur" class="form-label">Batas Selatan</label>
                                            <input type="text"
                                                class="form-control @error('batas_timur') is-invalid @enderror"
                                                id="batas_timur" name="batas_timur" required autofocus
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
                                            <label for="status_tanah" class="form-label">Status Tanah</label>
                                            <input type="text"
                                                class="form-control @error('status_tanah') is-invalid @enderror"
                                                id="status_tanah" name="status_tanah" required autofocus
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
                                            <label for="letak_tanah" class="form-label">Letak Tanah</label>
                                            <input type="text"
                                                class="form-control @error('letak_tanah') is-invalid @enderror"
                                                id="letak_tanah" name="letak_tanah" required autofocus
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
                                                id="batas_utara" name="batas_utara" required autofocus
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
                                                id="batas_selatan" name="batas_selatan" required autofocus
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
                                                id="batas_timur" name="batas_timur" required autofocus
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
                                                id="batas_barat" name="batas_barat" required autofocus
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
                                    <h4 class="card-title">Dokumen</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_ktp" class="form-label">Foto KTP</label>
                                            <input type="hidden" name="oldImage1"
                                                value="{{ old('jenis_usaha', $skt->poto_ktp) }}">
                                            @if ($skt->poto_ktp)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skt->poto_ktp) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek KTP</button>
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
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="image2" class="form-label">Foto Kartu Keluarga</label>
                                            <input type="hidden" name="oldImage2" value="{{ $skt->poto_kk }}">
                                            @if ($skt->poto_kk)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skt->poto_kk) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek KTP</button>
                                                    </a>
                                                </div>
                                            @endif
                                            <label for="image2" class="form-label">UbahFoto Kartu Keluarga</label>
                                            <input class="form-control @error('poto_kk') is-invalid @enderror"
                                                type="file" id="poto_kk" name="poto_kk" onchange="previewImage()">
                                            @error('poto_kk')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-12">
                                        <div class="form-group">
                                            <label for="poto_sppt" class="form-label">Foto SPPT</label>
                                            <input type="hidden" name="oldImage3" value="{{ $skt->poto_sppt }}">
                                            @if ($skt->poto_sppt)
                                                <div>
                                                    <a href="{{ asset('storage/' . $skt->poto_sppt) }}" target="_blank">
                                                        <button class="btn btn-success" type="button"> Cek KTP</button>
                                                    </a>
                                                </div>
                                            @endif
                                            <label for="poto_sppt" class="form-label">Ubah Foto SPPT</label>
                                            <input class="form-control @error('poto_sppt') is-invalid @enderror"
                                                type="file" id="poto_sppt" name="poto_sppt"
                                                onchange="previewImage()">
                                            @error('poto_sppt')
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
