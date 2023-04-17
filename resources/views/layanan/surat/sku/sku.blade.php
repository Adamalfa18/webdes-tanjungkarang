@extends('layanan.layout.main')
@section('container')
    @if (session()->has('success'))
        <div class="container">

            <div class="alert alert-success col-lg-auto" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="container">
        <h2>Tabel Pengajuan Surat Keterangan Usaha</h2>
        <h6 class="mb-3">Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
    </div>
    <div class="container">
        <div class="col-3">
            <a href="/layanan" class="btn btn-success"> <span data-feather="arrow-left"></span> Kembali </a>
        </div>
        <div class="col-auto mb-3 posisi-btn">
            <a class="btn btn-success" href="/create/sku">Tambah Pengajuan</a>
        </div>
    </div>

    <div class="container">
        <div class=" card col-lg-12">
            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <td scope="col">No</td>
                            <td scope="col">Nama Pengaju</td>
                            <td scope="col">Nama Usaha</td>
                            <td scope="col">Jenis Usaha</td>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surat_keterangan_usaha as $sku)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sku->data_penduduk->nama }}</td>
                                <td>{{ $sku->nama_usaha }}</td>
                                <td>{{ $sku->jenis_usaha }}</td>
                                <td>
                                    @switch($sku->status_layanan_id)
                                        @case(1)
                                            <span class="badge bg-primary">{{ $sku->status_layanan->status }}</span>
                                        @break

                                        @case(2)
                                            <span class="badge bg-danger">{{ $sku->status_layanan->status }}</span>
                                        @break

                                        @case(3)
                                            <span class="badge bg-warning">{{ $sku->status_layanan->status }}</span>
                                        @break

                                        @case(4)
                                            <span class="badge bg-success">{{ $sku->status_layanan->status }}</span>
                                        @break
                                    @endswitch
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
