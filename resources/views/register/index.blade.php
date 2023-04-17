@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="col-md-12">
                    <main class="form-registration">
                        <h1 class="h3 mb-3 mt-5 fw-bold text-center">Daftar Akun</h1>
                        <form action="/register" method="post">
                            @csrf
                            <div class="form-floating">
                                <input type="text" name="name"
                                    class="form-control my-3 rounded-top @error('name') is-invalid @enderror" id="name"
                                    placeholder="Name" required value="{{ old('name') }}">
                                <label for="name">Name</label>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text" name="nik"
                                    class="form-control my-3  @error('nik') is-invalid @enderror" id="nik"
                                    placeholder="Nik" required value="{{ old('nik') }}">
                                <label for="nik">NIK</label>
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="text" name="username"
                                    class="form-control my-3  @error('username') is-invalid @enderror" id="username"
                                    placeholder="Username" required value="{{ old('username') }}">
                                <label for="username">User Name</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="email" name="email"
                                    class="form-control my-3 @error('email') is-invalid @enderror" id="email"
                                    placeholder="name@example.com" required value="{{ old('email') }}">
                                <label for="email">Email address</label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control counded-buttom @error('password') is-invalid @enderror"
                                    id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="w-100 btn btn-lg btn-primary mt-4 mb-5" type="submit">Register</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>
@endsection
