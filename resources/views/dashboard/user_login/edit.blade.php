@extends('dashboard.layouts.main')

@section('kelola_akun', 'active')
@section('title', 'Verifikasi Akun')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="justify-content-center">
        <div class="col-md-12">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-lg-8">
                <form method="post" action="/dashboard/user_login/{{ $user->id }}" class="mb-5"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                            name="username" required autofocus value="{{ old('username', $user->username) }}">
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">User Role</label>
                        <select class="form-select" name="user_role_id">
                            @foreach ($user_role as $usr)
                                @if (old('user_role_id', $user->user_role_id) == $usr->id)
                                    <option value="{{ $usr->id }}" selected>{{ $usr->role }}</option>
                                @else
                                    <option value="{{ $usr->id }}">{{ $usr->role }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">Nik</label>
                        <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik" required autofocus value="{{ old('nik', $user->nik) }}">
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <a href="/dashboard/user_login" class="btn btn-success"> <span
                            data-feather="arrow-left"></span>Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        @endsection
