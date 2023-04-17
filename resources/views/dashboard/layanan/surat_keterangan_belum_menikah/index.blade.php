@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('izin_usaha', 'active')
@section('title', 'Surat Keterangan Belum Menikah')
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
        <a href="/dashboard/layanan/skbm/cetak" class="btn btn-primary" target="_blank"><span data-feather="printer"></span>
            Cetak</a>
        <i class="bi bi-file-pdf"></i>
        <a href="/dashboard/layanan/skbm/cetakpdf" class="btn btn-primary" target="_blank"><span
                data-feather="file-text"></span>
            Pdf</a>
    </div>
    <div class="col-3 mt-3">
        <a href="/dashboard/layanan/surat_keterangan_belum_menikah/create" class="btn btn-primary mb-3">Tambah Pengajuan</a>
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
                    @foreach ($surat_keterangan_belum_menikah as $skbm)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                no/{{ $loop->iteration }}/skbm/{{ \Carbon\Carbon::parse($skbm->created_at)->format('y') }}
                            </td>
                            <td>{{ $skbm->data_penduduk->nama }}</td>
                            <td>{{ $skbm->data_penduduk->no_hp }}
                            <td>{{ $skbm->created_at }}</td>
                            </td>
                            <td>
                                @switch($skbm->status_layanan_id)
                                    @case(1)
                                        <span class="badge bg-primary">{{ $skbm->status_layanan->status }}</span>
                                    @break

                                    @case(2)
                                        <span class="badge bg-danger">{{ $skbm->status_layanan->status }}</span>
                                    @break

                                    @case(3)
                                        <span class="badge bg-warning">{{ $skbm->status_layanan->status }}</span>
                                    @break

                                    @case(4)
                                        <span class="badge bg-success">{{ $skbm->status_layanan->status }}</span>
                                    @break
                                @endswitch

                            </td>
                            <td>
                                <a href="/dashboard/layanan/surat_keterangan_belum_menikah/{{ $skbm->id }}/edit"
                                    class="badge bg-warning"><span data-feather="edit"></span></a>
                                <a href="/dashboard/layanan/surat_keterangan_belum_menikah/{{ $skbm->id }}/verifikasi"
                                    class="badge bg-primary"><span data-feather="check-square"></span></a>
                                <form action="/dashboard/layanan/surat_keterangan_belum_menikah/{{ $skbm->id }}"
                                    method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Akah anda yakin?')"><span
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
