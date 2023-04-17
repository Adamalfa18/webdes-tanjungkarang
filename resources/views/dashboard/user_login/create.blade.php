@extends('dashboard.layouts.main')
@section('kelola_akun', 'active')
@section('title', 'Tambah Akun')
@section('container')

    <div class="col-lg-8">
        <form method="post" action="/dashboard/user_login" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                    id="username" placeholder="Nama Pengguna" required value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control  @error('nik') is-invalid @enderror" id="nik"
                    placeholder="No Induk Kependudukan" required value="{{ old('nik') }}">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="user_role_id" class="form-label">Status Akun</label>
                    <select class="form-select" name="user_role_id">
                        @foreach ($user_role as $user_role)
                            @if (old('user_role_id') == $user_role->id)
                                <option value="{{ $user_role->id }}" selected>{{ $user_role->role }}</option>
                            @else
                                <option value="{{ $user_role->id }}">{{ $user_role->role }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password"
                        class="form-control counded-buttom @error('password') is-invalid @enderror" id="password"
                        placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <a href="/dashboard/user_login" class="btn btn-success"> <span data-feather="arrow-left"></span>Kembali</a>
                <button type="submit" class="btn btn-primary">Tambah Akun</button>
        </form>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Tambah Akun</h1>
                <form action="/dashboard/user_login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name"
                            class="form-control rounded-top @error('name') is-invalid @enderror" id="name"
                            placeholder="Nama" required value="{{ old('name') }}">
                        <label for="name">Nama</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror"
                            id="username" placeholder="Nama Penguna" required value="{{ old('username') }}">
                        <label for="username">Nama Pengguna</label>
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="number" name="nik" class="form-control  @error('nik') is-invalid @enderror"
                            id="nik" placeholder="No Induk Kependudukan" required value="{{ old('nik') }}">
                        <label for="nik">Nik</label>
                        @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email Pengunan</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select class="form-select" name="user_role_id">
                            @foreach ($user_role as $user_role)
                                @if (old('user_role_id') == $user_role->id)
                                    <option value="{{ $user_role->id }}" selected>{{ $user_role->role }}</option>
                                @else
                                    <option value="{{ $user_role->id }}">{{ $user_role->role }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control counded-buttom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Register</button>
                </form>
            </main>
        </div>
    </div> --}}
@endsection
