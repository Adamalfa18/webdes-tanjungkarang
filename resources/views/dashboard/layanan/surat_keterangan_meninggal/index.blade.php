@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('title', 'Surat Keterangan Meninggal')
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
        <a href="/dashboard/layanan/skm/cetak" class="btn btn-primary" target="_blank"><span data-feather="printer"></span>
            Cetak</a>
        <i class="bi bi-file-pdf"></i>
        <a href="/dashboard/layanan/skm/cetakpdf" class="btn btn-primary" target="_blank"><span
                data-feather="file-text"></span>
            Pdf</a>
    </div>
    <div class="col-3 mt-3">
        <a href="/dashboard/layanan/surat_keterangan_meninggal/create" class="btn btn-primary mb-3">Tambah Pengajuan</a>
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
                    @foreach ($surat_keterangan_meninggal as $skm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                no/{{ $loop->iteration }}/skm/{{ \Carbon\Carbon::parse($skm->created_at)->format('y') }}
                            </td>
                            <td>{{ $skm->data_penduduk->nama }}</td>
                            <td>{{ $skm->data_penduduk->no_hp }}</td>
                            <td>{{ $skm->created_at }}</td>
                            <td>
                                @switch($skm->status_layanan_id)
                                    @case(1)
                                        <span class="badge bg-primary">{{ $skm->status_layanan->status }}</span>
                                    @break

                                    @case(2)
                                        <span class="badge bg-danger">{{ $skm->status_layanan->status }}</span>
                                    @break

                                    @case(3)
                                        <span class="badge bg-warning">{{ $skm->status_layanan->status }}</span>
                                    @break

                                    @case(4)
                                        <span class="badge bg-success">{{ $skm->status_layanan->status }}</span>
                                    @break
                                @endswitch

                            </td>
                            <td>
                                <a href="/dashboard/layanan/surat_keterangan_meninggal/{{ $skm->id }}/edit"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                <a href="/dashboard/layanan/surat_keterangan_meninggal/{{ $skm->id }}/verifikasi"
                                    class="badge bg-primary"><span data-feather="check-square"></span></a>
                                <form action="/dashboard/layanan/surat_keterangan_meninggal/{{ $skm->id }}"
                                    method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah Kamu yakin?')"><span
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
