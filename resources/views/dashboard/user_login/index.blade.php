@extends('dashboard.layouts.main')

@section('kelola_akun', 'active')
@section('title', 'Pengaturan Akun')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-end p-3">
        <div class="col-md-6">
            <a href="/dashboard/user_login/create" class="btn btn-primary mb-3">Tambah Akun Baru</a>
        </div>
        <div class="col-md-6">
            <form action="/dashboard/user_login">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari....." name="cari"
                        value="{{ request('cari') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    @if ($users->count())
        <div class="card">
            <div class="table-responsive col-lg-auto">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->user_role->role }}</td>
                                <td>
                                    <a href="/dashboard/user_login/{{ $user->id }}/edit" class="badge bg-warning"><span
                                            data-feather="edit"></span></a>
                                    <a href="/dashboard/edit_password/{{ $user->id }}/edit"
                                        class="badge bg-primary"><span data-feather="key"></span></a>
                                    <form action="/dashboard/user_login/{{ $user->id }}" method="post"
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
    @else
        <p class="text-center fs-4"> Data Yang Dicari Tidak Ada</p>
    @endif
@endsection
