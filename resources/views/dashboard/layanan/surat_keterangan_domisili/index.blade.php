@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('title', 'Surat Keterangan Domisili')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto mt-3">
        <a href="/dashboard/layanan" class="btn btn-primary"> <span data-feather="arrow-left"></span> Kembali Ke Layanan</a>
    </div>
    <div class="col-auto mt-3 posisi-btn">
        <a href="/dashboard/layanan/skd/cetak" class="btn btn-primary" target="_blank"><span data-feather="printer"></span>
            Cetak</a>
        <i class="bi bi-file-pdf"></i>
        <a href="/dashboard/layanan/skd/cetakpdf" class="btn btn-primary" target="_blank"><span
                data-feather="file-text"></span>
            Pdf</a>
    </div>
    <div class="col-3 mt-3">
        <a href="/dashboard/layanan/surat_keterangan_domisili/create" class="btn btn-primary mb-3">Tambah Pengajuan</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Surat</th>
                        <th scope="col">Nama Pengaju</th>
                        <th scope="col">No Hp</th>
                        <th scope="col">Tanggal Pengajuan</th>
                        <th scope="col">Setatus</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surat_keterangan_domisili as $skd)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                no/{{ $loop->iteration }}/sku/{{ \Carbon\Carbon::parse($skd->created_at)->format('y') }}
                            </td>
                            <td>{{ $skd->data_penduduk->nama }}</td>
                            <td>{{ $skd->data_penduduk->no_hp }}</td>
                            <td>{{ $skd->created_at }}</td>
                            <td>
                                @switch($skd->status_layanan_id)
                                    @case(1)
                                        <span class="badge bg-primary">{{ $skd->status_layanan->status }}</span>
                                    @break

                                    @case(2)
                                        <span class="badge bg-danger">{{ $skd->status_layanan->status }}</span>
                                    @break

                                    @case(3)
                                        <span class="badge bg-warning">{{ $skd->status_layanan->status }}</span>
                                    @break

                                    @case(4)
                                        <span class="badge bg-success">{{ $skd->status_layanan->status }}</span>
                                    @break
                                @endswitch

                            </td>
                            <td>
                                <a href="/dashboard/layanan/surat_keterangan_domisili/{{ $skd->id }}/edit"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                <a href="/dashboard/layanan/surat_keterangan_domisili/{{ $skd->id }}/verifikasi"
                                    class="badge bg-primary"><span data-feather="check-square"></span></a>
                                <form action="/dashboard/layanan/surat_keterangan_domisili/{{ $skd->id }}"
                                    method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah kamu yakin?')"><span
                                            data-feather="x-circle"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
