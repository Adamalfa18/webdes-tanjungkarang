@extends('dashboard.layouts.main')

@section('program-bantuan', 'active')
@section('title', 'Data Penerima Bantuan')
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
    </div>

    <div class=" card col-lg-auto">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama programs</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assistances as $assistance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assistance->nama }}</td>
                            <td>{{ $assistance->nik }}</td>
                            <td>{{ $assistance->alamat }}</td>
                            <td>{{ $assistance->program->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>


@endsection
