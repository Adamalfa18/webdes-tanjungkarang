@extends('dashboard.layouts.main')
@section('dashboard', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Mading</h1>
    </div>




    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="p-3">
                        <a href="/dashboard" class="btn btn-success"> <span data-feather="arrow-left"></span>Kembali</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/dashboard/mading_desa/{{ $mading->id }}"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="hidden" name="oldImage" value="{{ $mading->image }}">
                                        @if ($mading->image)
                                            <img src="{{ asset('storage/' . $mading->image) }}"
                                                class="img-preview img-fluid mb-3 d-block gambar">
                                        @else
                                            <img class="img-preview img-fluid mb-3">
                                        @endif
                                        <input class="form-control @error('image') is-invalid @enderror" type="file"
                                            id="image" name="image" onchange="previewImage()">
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="judul" class="form-label">Nama</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                                id="judul" name="judul" required autofocus
                                                value="{{ old('judul', $mading->judul) }}">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="deskripsi" class="form-label">Alamat</label>
                                            <input type="text"
                                                class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                                name="deskripsi" required
                                                value="{{ old('deskripsi', $mading->deskripsi) }}">
                                            @error('deskripsi')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Tambah</button>
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
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
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
