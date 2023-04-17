@extends('layouts.main')
@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-8" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-12">


                <div class="my-5">
                    <h3>Data Desa Tanjungkarang</h3>
                    <h6>Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
                </div>

                <div class="row">
                    <div class="col-lg-4 fixed mb-2">
                        <div id="list-example" class="list-group">
                            <a class="list-group-item list-group-item-action" href="#list-item-1">Data Pekerjaan</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-2">Data Pendidikan</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-3">Data Agama</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-4">Data Jenis Kelamin</a>
                            <a class="list-group-item list-group-item-action" href="#list-item-5">Data Pernikahan</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true"
                            class="scrollspy-example" tabindex="0">
                            <div class="card" id="list-item-1">
                                <div class="card-body">
                                    <div id="chart-pekerjaan"></div>
                                    <h4>Tabel Data Pekerjaan</h4>
                                    <div class="table-responsive col-lg-auto">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Pekerjaan</th>
                                                    <th scope="col">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($professions as $professi)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $professi->kelompok }}</td>
                                                        <td>{{ $professi->total }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="card" id="list-item-2">
                                <div class="card-body">
                                    <div id="chart-pendidikan"></div>
                                    <h4>Tabel Data Pendidikan</h4>
                                    <div class="table-responsive col-lg-auto">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Pendidikan</th>
                                                    <th scope="col">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($education as $educati)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $educati->pendidikan }}</td>
                                                        <td>{{ $educati->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Data Agama --}}

                            <div class="card" id="list-item-3">
                                <div class="card-body">
                                    <div id="chart-agama"></div>
                                    <h4>Tabel Data Agama</h4>
                                    <div class="table-responsive col-lg-auto">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Pendidikan</th>
                                                    <th scope="col">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($religions as $agama)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $agama->agama }}</td>
                                                        <td>{{ $agama->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div class="card" id="list-item-4">
                                <div class="card-body">
                                    <div id="chart-jenis-kelamin"></div>
                                    <h4>Tabel Data Jenis Kelamin</h4>
                                    <div class="table-responsive col-lg-auto">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Jenis Kelamin</th>
                                                    <th scope="col">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($genders as $jenis)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $jenis->jenis }}</td>
                                                        <td>{{ $jenis->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Pernikahan --}}
                            <div class="card" id="list-item-5">
                                <div class="card-body">
                                    <div id="chart-perkawinan list-item-5"></div>
                                    <h4>Tabel Data Setatus Pernikahan</h4>
                                    <div class=" col-lg-auto">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Jumlah</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($marriages as $perkawinan)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $perkawinan->status }}</td>
                                                        <td>{{ $perkawinan->total }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

            {{-- @push('scripts')
                <script>
                    var dataPekerjaanChart = {
                        series: {!! $jumlah_data_pekerjaan !!},
                        labels: {!! $data_chart_pekerjaan !!},
                        colors: ['#435ebe', '#55c6e8', '#5350e9'],
                        chart: {
                            type: 'donut',
                            width: '100%',
                            height: '350px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '30%'
                                }
                            }
                        }
                    }


                    var chartDataPekerjaan = new ApexCharts(document.getElementById('chart-pekerjaan'),
                        dataPekerjaanChart);
                    chartDataPekerjaan.render();


                    //chart Pendidikan
                    var dataPendidikanChart = {
                        series: {!! $jumlah_data_pendidikan !!},
                        labels: {!! $data_chart_pendidikan !!},
                        colors: ['#435ebe', '#55c6e8', '#5350e9'],
                        chart: {
                            type: 'donut',
                            width: '100%',
                            height: '350px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '30%'
                                }
                            }
                        }
                    }


                    var chartDataPendidikan = new ApexCharts(document.getElementById('chart-pendidikan'),
                        dataPendidikanChart);
                    chartDataPendidikan.render();

                    //akhir char pendidikan

                    //Jenis Kelamim
                    var dataJenisKelaminChart = {
                        series: {!! $jumlah_data_jenis_kelamin !!},
                        labels: {!! $data_chart_jenis_kelamin !!},
                        colors: ['#435ebe', '#55c6e8', '#5350e9'],
                        chart: {
                            type: 'donut',
                            width: '100%',
                            height: '350px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '30%'
                                }
                            }
                        }
                    }


                    var chartDataJenisKelamin = new ApexCharts(document.getElementById('chart-jenis-kelamin'),
                        dataJenisKelaminChart);
                    chartDataJenisKelamin.render();

                    //Akhir 

                    // data agama
                    var dataAgamaChart = {
                        series: {!! $jumlah_data_agama !!},
                        labels: {!! $data_chart_agama !!},
                        colors: ['#435ebe', '#55c6e8', '#5350e9'],
                        chart: {
                            type: 'donut',
                            width: '100%',
                            height: '350px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '30%'
                                }
                            }
                        }
                    }


                    var chartDataAgama = new ApexCharts(document.getElementById('chart-agama'),
                        dataAgamaChart);
                    chartDataAgama.render();
                    //ahir agama
                    var dataPerkawinanChart = {
                        series: {!! $jumlah_data_perkawinan !!},
                        labels: {!! $data_chart_perkawinan !!},
                        colors: ['#435ebe', '#55c6e8', '#5350e9'],
                        chart: {
                            type: 'donut',
                            width: '100%',
                            height: '350px'
                        },
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '30%'
                                }
                            }
                        }
                    }

                    var chartDataPerkawinan = new ApexCharts(document.getElementById('chart-perkawinan'),
                        dataPerkawinanChart);
                    chartDataPerkawinan.render();
                    //akhir
                </script>
            @endpush --}}
