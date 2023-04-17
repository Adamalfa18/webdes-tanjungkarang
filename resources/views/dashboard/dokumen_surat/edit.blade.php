@extends('dashboard.layouts.main')
@section('dokumen_surat', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Dokumen</h1>
    </div>




    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/dashboard/dokumen_surat" class="btn btn-success"> <span
                                data-feather="arrow-left"></span>Kembali</a>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form mb-5" method="post"
                                    action="/dashboard/dokumen_surat/{{ $dokumen_surat->id }}"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama" class="form-label">Nama Template</label>
                                                <input type="text"
                                                    class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                    name="nama" required autofocus
                                                    value="{{ old('nama', $dokumen_surat->nama) }}">
                                                @error('nama')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <input type="text"
                                                    class="form-control @error('deskripsi') is-invalid @enderror"
                                                    id="deskripsi" name="deskripsi" required
                                                    value="{{ old('deskripsi', $dokumen_surat->deskripsi) }}">
                                                @error('deskripsi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="file" class="form-label">Dokumen</label>
                                                <input type="hidden" name="oldImage" value="{{ $dokumen_surat->file }}">
                                                @if ($dokumen_surat->file)
                                                    <a href="{{ asset('storage/' . $dokumen_surat->file) }}"
                                                        target="_blank">
                                                        <button class=" file-preview btn btn-success d-block mb-1"
                                                            type="button">
                                                            Download</button>
                                                    </a></td>
                                                @else
                                                    <p>Data Kosong</p>
                                                @endif
                                                <input class="form-control @error('file') is-invalid @enderror"
                                                    type="file" id="file" name="file" onchange="previewImage()">
                                                @error('file')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Ubah</button>
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
            const file = document.querySelector('#file');
            const filePreview = document.querySelector('.file-preview');

            filePreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(file.files[0]);

            oFReader.onload = function(oFREvent) {
                filePreview.src = oFREvent.target.result;
            }
        }
    </script>

@endsection
