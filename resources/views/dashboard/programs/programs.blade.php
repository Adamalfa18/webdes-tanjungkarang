@extends('dashboard.layouts.main')

@section('program-bantuan', 'active')
@section('title', 'Data Bantuan')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div>
        <a href="/dashboard/programs/create" class="btn btn-primary mb-3">
            <span data-feather="file-plus"></span>
            Careate Data Bantuan
        </a>

        <a href="/dashboard/programs/assistances" class="btn btn-primary mb-3">
            <span data-feather="file-text"></span>
            Data Penerima Bantuan</a>
    </div>


    <div class=" card col-lg-auto">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Program</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sasaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="/dashboard/programs/program/{{ $program->id }}">
                                    {{ $program->name }}
                                </a>
                            </td>
                            <td>{{ $program->asal }}</td>
                            <td>{{ $program->jumlah }}</td>
                            <td>{{ $program->sasaran }}</td>
                            <td>{{ $program->status }}</td>
                            <td>
                                <a href="/dashboard/programs/{{ $program->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/programs/{{ $program->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
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
