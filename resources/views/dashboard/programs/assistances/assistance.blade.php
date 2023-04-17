@extends('dashboard.layouts.main')

@section('program-bantuan', 'active')
@section('title', 'Data Pekerjaan')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="/dashboard/programs" class="btn btn-primary mb-3">
            <span data-feather="arrow-left"></span>
            Kembali
        </a>
        <a href="/dashboard/programs/assistances/create" class="btn btn-primary mb-3">
            <span data-feather="file-plus"></span>
            Careate New Status</a>
    </div>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Nik</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nama Bantuan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assistances as $assistance)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assistance->nama }}</td>
                                    <td>{{ $assistance->nik }}</td>
                                    <td>{{ $assistance->alamat }}</td>
                                    <td><a href="/dashboard/programs/program/{{ $assistance->program->id }}">
                                            {{ $assistance->program->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/dashboard/programs/assistances/{{ $assistance->id }}/edit"
                                            class="badge bg-warning"><span data-feather="edit"></span></a>
                                        <form action="/dashboard/programs/assistances/{{ $assistance->id }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0"
                                                onclick="return confirm('Are you sure?')"><span
                                                    data-feather="x-circle"></span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
