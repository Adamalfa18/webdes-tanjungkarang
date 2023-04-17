@extends('dashboard.layouts.main')

@section('dokumen', 'active')
@section('title', 'Dokumen Desa')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto">
        <a href="/dashboard/data_pdf/create" class="btn btn-primary mb-3">Tambah Dokumen</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">No</th>
                        <th scope="col">Nama File</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pdf as $pdf)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pdf->judul }}</td>
                            <td>{{ $pdf->deskripsi }}</td>
                            <td><a href="{{ asset('storage/' . $pdf->file) }}" target="_blank">
                                    <button class="btn btn-success" type="button"> Download</button>
                                </a></td>
                            <td>
                                <a href="/dashboard/data_pdf/{{ $pdf->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/data_pdf/{{ $pdf->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0"
                                        onclick="return confirm('Apakah anda yakin?')"><span
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
