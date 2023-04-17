@extends('dashboard.layouts.main')

@section('data_desa', 'active')
@section('perkawinan', 'active')
@section('title', 'Data Perkawinan')
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
        <div class="card">
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
                            <form method="post" action="/dashboard/data/marriages" class="mb-5"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" required autofocus>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" class="form-control @error('jumlah') is-invalid @enderror"
                                        id="jumlah" name="jumlah" required>
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
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Setatus</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($marriage as $marriag)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $marriag->status }}</td>
                                <td>
                                    <button type="button" class="badge bg-warning border-0" data-bs-toggle="modal"
                                        data-bs-target="#modal-edit{{ $marriag->id }}">
                                        <span data-feather="edit"></span></a>
                                    </button>
                                    <form action="/dashboard/data/marriages/{{ $marriag->id }}" method="post"
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
                            <div class="modal fade" id="modal-edit{{ $marriag->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Pekerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <form method="post" action="/dashboard/data/marriages/{{ $marriag->id }}"
                                                class="mb-5" enctype="multipart/form-data">
                                                @method('put')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status</label>
                                                    <input type="text"
                                                        class="form-control @error('status') is-invalid @enderror"
                                                        id="status" name="status" required autofocus
                                                        value="{{ old('status', $marriag->status) }}">
                                                    @error('status')
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
