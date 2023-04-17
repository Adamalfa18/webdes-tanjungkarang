@extends('dashboard.layouts.main')
@section('profil-desa', 'active')
@section('category-profil', 'active')
@section('title', 'Kategori Profil Desa')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="col-auto mt-3">
        <a href="/dashboard/kategori_profil/create" class="btn btn-primary mb-3">Tambah Kategori Profil</a>
    </div>
    <div class="card">
        <div class="table-responsive col-lg-auto">
            <table style="text-align: center" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">slug</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category_profil as $categori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $categori->nama }}</td>
                            <td>{{ $categori->slug }}</td>
                            <td>
                                <a href="/dashboard/kategori_profil/{{ $categori->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/kategori_profil/{{ $categori->id }}" method="post"
                                    class="d-inline">
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
