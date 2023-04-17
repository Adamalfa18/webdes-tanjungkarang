@extends('dashboard.layouts.main')

@section('dokumen_surat', 'active')
@section('title', 'Template Surat')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto mt-4">
        <a href="/dashboard/dokumen_surat/create" class="btn btn-primary mb-3">Tambah Template</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">No</th>
                        <th scope="col">Nama Template</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">File</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokumen_surat as $surat)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $surat->nama }}</td>
                            <td>{{ $surat->deskripsi }}</td>
                            <td><a href="{{ asset('storage/' . $surat->file) }}" target="_blank">
                                    <button class="btn btn-success" type="button"> Download</button>
                                </a></td>
                            <td>
                                <a href="/dashboard/dokumen_surat/{{ $surat->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/dokumen_surat/{{ $surat->id }}" method="post" class="d-inline">
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
