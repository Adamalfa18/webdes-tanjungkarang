@extends('dashboard.layouts.main')

@section('data', 'active')
@section('data_penduduk', 'active')
@section('pendidikan', 'active')
@section('title', 'Data Penduduk')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8 d-md-flex" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close ms-auto justify-content-md-end" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger col-lg-8 d-md-flex" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close ms-auto justify-content-md-end" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-end p-3">
        <div class="col-6">
            <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data
            </button>
        </div>
        <div class="col-6">
            <form action="/dashboard/data-penduduk">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari....." name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="card">
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Penduduk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="/dashboard/data-penduduk" class="mb-5"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" required autofocus>
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" required autofocus>
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" required>
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">No KK</label>
                                    <input type="number" class="form-control @error('no_kk') is-invalid @enderror"
                                        id="no_kk" name="no_kk" required autofocus>
                                    @error('no_kk')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" name="tanggal_lahir" required autofocus>
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" name="no_hp" required>
                                    @error('no_hp')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                    <select class="form-select" name="education_id">
                                        <option selected>Pilih Data Pendidikan</option>
                                        @foreach ($pendidikan as $pendidikan)
                                            @if (old('education_id') == $pendidikan->id)
                                                <option value="{{ $pendidikan->id }}" selected>
                                                    {{ $pendidikan->pendidikan }}
                                                </option>
                                            @else
                                                <option value="{{ $pendidikan->id }}">{{ $pendidikan->pendidikan }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <select class="form-select" name="professions_id">
                                        <option selected>Pilih Data Pekerjaan</option>
                                        @foreach ($pekerjaan as $pekerjaan)
                                            @if (old('professions_id') == $pekerjaan->id)
                                                <option value="{{ $pekerjaan->id }}" selected>
                                                    {{ $pekerjaan->kelompok }}
                                                </option>
                                            @else
                                                <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->kelompok }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-select" name="religions_id">
                                        <option selected>Pilih Data agama</option>
                                        @foreach ($agama as $agama)
                                            @if (old('religions_id') == $agama->id)
                                                <option value="{{ $agama->id }}" selected>
                                                    {{ $agama->agama }}
                                                </option>
                                            @else
                                                <option value="{{ $agama->id }}">{{ $agama->agama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="perkawinan" class="form-label">Status Perkawinan</label>
                                    <select class="form-select" name="marriages_id">
                                        <option selected>Pilih Data Perkawinan</option>
                                        @foreach ($perkawinan as $perkawinan)
                                            @if (old('marriages_id') == $perkawinan->id)
                                                <option value="{{ $perkawinan->id }}" selected>
                                                    {{ $perkawinan->status }}
                                                </option>
                                            @else
                                                <option value="{{ $perkawinan->id }}">{{ $perkawinan->status }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Status Jenis Kelamin</label>
                                    <select class="form-select" name="genders_id">
                                        <option selected>Pilih Data Jenis Kelamin</option>
                                        @foreach ($jenis_kelamin as $kelamin)
                                            @if (old('genders_id') == $kelamin->id)
                                                <option value="{{ $kelamin->id }}" selected>
                                                    {{ $kelamin->jenis }}
                                                </option>
                                            @else
                                                <option value="{{ $kelamin->id }}">{{ $kelamin->jenis }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="warganegara" class="form-label">Status Warganegara</label>
                                    <select class="form-select" name="warganegara_id">
                                        <option selected>Pilih Data Warganegara</option>
                                        @foreach ($warganegara as $warganegara)
                                            @if (old('warganegara_id') == $warganegara->id)
                                                <option value="{{ $warganegara->id }}" selected>
                                                    {{ $warganegara->setatus }}
                                                </option>
                                            @else
                                                <option value="{{ $warganegara->id }}">{{ $warganegara->setatus }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Tamnbah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Modal --}}
            @if ($data_penduduk->count())
                <div class="table-responsive col-lg-auto">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">No HP</th>
                                <th scope="col">No KK</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Penddidikan</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Setatus Perkawinan</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Warganegara</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_penduduk as $penduduk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penduduk->nama }}</td>
                                    <td>{{ $penduduk->nik }}</td>
                                    <td>{{ $penduduk->alamat }}</td>
                                    <td>{{ $penduduk->tanggal_lahir }}</td>
                                    <td>{{ $penduduk->no_hp }}</td>
                                    <td>{{ $penduduk->no_kk }}</td>
                                    <td>{{ $penduduk->religions->agama }}</td>
                                    <td>{{ $penduduk->education->pendidikan }}</td>
                                    <td>{{ $penduduk->professions->kelompok }}</td>
                                    <td>{{ $penduduk->marriages->status }}</td>
                                    <td>{{ $penduduk->genders->jenis }}</td>
                                    <td>{{ $penduduk->warganegara->setatus }}</td>
                                    <td>
                                        {{-- <button type="button" class="badge bg-warning border-0 modal-edit"
                                        data-bs-toggle="modal" data-bs-target="#modal-edit{{ $penduduk->id }}">
                                        <span data-feather="edit"></span></a>
                                    </button> --}}
                                        <a href="/dashboard/data-penduduk/{{ $penduduk->id }}/edit"
                                            class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <form action="/dashboard/data-penduduk/{{ $penduduk->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Apakah anda yakin?')"><span
                                                    data-feather="x-circle"></span></button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Edit-->
                                {{-- <div class="modal fade" id="modal-edit{{ $penduduk->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/dashboard/data-penduduk/{{ $penduduk->id }}"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="nik" class="form-label">NIK</label>
                                                    <input type="number"
                                                        class="form-control @error('nik') is-invalid @enderror"
                                                        id="nik" name="nik" required autofocus
                                                        value="{{ old('nik', $penduduk->nik) }}">
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nama" class="form-label">Nama</label>
                                                    <input type="text"
                                                        class="form-control @error('nama') is-invalid @enderror"
                                                        id="nama" name="nama" required
                                                        value="{{ old('nama', $penduduk->nama) }}">
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_kk" class="form-label">No KK</label>
                                                    <input type="number"
                                                        class="form-control @error('no_kk') is-invalid @enderror"
                                                        id="no_kk" name="no_kk" required
                                                        value="{{ old('no_kk', $penduduk->no_kk) }}">
                                                    @error('no_kk')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="no_hp" class="form-label">No HP</label>
                                                    <input type="number"
                                                        class="form-control @error('no_hp') is-invalid @enderror"
                                                        id="no_hp" name="no_hp" required
                                                        value="{{ old('no_hp', $penduduk->no_hp) }}">
                                                    @error('no_hp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="alamat" class="form-label">Alamat</label>
                                                    <input type="text"
                                                        class="form-control @error('alamat') is-invalid @enderror"
                                                        id="alamat" name="alamat" required
                                                        value="{{ old('alamat', $penduduk->alamat) }}">
                                                    @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input type="date"
                                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                        id="tanggal_lahir" name="tanggal_lahir" required
                                                        value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
                                                    @error('tanggal_lahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="warganegara" class="form-label">Warganegara</label>
                                                    <select class="form-select" name="warganegara_id">
                                                        @foreach ($warganegara as $warganegara)
                                                            @if (old('warganegara_id', $penduduk->warganegara_id) == $warganegara->id)
                                                                <option value="{{ $warganegara->id }}" selected>
                                                                    {{ $warganegara->name }}</option>
                                                            @else
                                                                <option value="{{ $warganegara->id }}">
                                                                    {{ $warganegara->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                </div>

                {{-- End Modal --}}
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@else
    <p class="text-center fs-4"> Data Yang Dicari Tidak Ada</p>
    @endif
@endsection
