@extends('dashboard.layouts.main')
@section('profil-desa', 'active')
@section('profil', 'active')
@section('title', 'Profil Desa')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto">
        <a href="/dashboard/profil_desa/create" class="btn btn-primary mb-3">Tambah Profil Desa</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori Profil</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profil_desa as $profil)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $profil->nama }}</td>
                            <td>{{ $profil->category_profil->nama }}</td>
                            <td>
                                <a href="/dashboard/profil_desa/{{ $profil->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/profil_desa/{{ $profil->id }}" method="post" class="d-inline">
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
