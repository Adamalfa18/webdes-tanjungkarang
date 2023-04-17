@extends('dashboard.layouts.main')

@section('data_desa', 'active')
@section('pekerjaan', 'active')

@section('title', 'Data Pekerjaan')
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

    <div class="col-lg-8">
        <div class="card" class="active">
            <div class="card-body">
                <div id="chart-profile-visit"></div>
            </div>

            <div class="p-3">
                <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                </button>
            </div>
            <!-- Modal Tambah -->
            <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pekerjaan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="/dashboard/data/professions" class="mb-5"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="kelompok" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="kelompok" name="kelompok" required
                                        autofocus placeholder="Pekerjaan">
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required
                                        placeholder="Jumlah">
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


            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pekerjaan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profession as $professi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $professi->kelompok }}</td>
                                <td>
                                    <button type="button" class="badge bg-warning border-0" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit{{ $professi->id }}">
                                        <span data-feather="edit"></span></a>
                                    </button>
                                    <form action="/dashboard/data/professions/{{ $professi->id }}" method="post"
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
                            <div class="modal fade" id="modal-edit{{ $professi->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="/dashboard/data/professions/{{ $professi->id }}"
                                                enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="kelompok" class="form-label">Pekerjaan</label>
                                                    <input type="string"
                                                        class="form-control @error('kelompok') is-invalid @enderror"
                                                        id="kelompok" name="kelompok" required autofocus
                                                        value="{{ $professi->kelompok }}">
                                                    @error('kelompok')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Kembali</button>
                                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- End Modal --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

{{-- @push('scripts')
    <script>
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'Jumlah Pekerja',
                data: {!! $jumlah_data !!}
            }],
            colors: '#435ebe',
            xaxis: {
                categories: {!! $data !!}
                    // ["Jan","Feb","Mar","Apr","May","Jun","Jul", "Aug","Sep","Oct","Nov","Dec"]
                    ,
            },
        }

        var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
        chartProfileVisit.render();

        var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'),
            optionsVisitorsProfile);
        chartVisitorsProfile.render();
    </script>
@endpush --}}
