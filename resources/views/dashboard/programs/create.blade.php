@extends('dashboard.layouts.main')
@section('program-bantuan', 'active')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Program Bantuan </h1>
    </div>




    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Multiple Column</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form mb-5" method="post" action="/dashboard/programs"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name" class="form-label">Nama Bantuan</label>
                                            <input placeholder="Nama Bantuan" type="text"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                name="name" required autofocus value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="asal" class="form-label">Asal</label>
                                            <input placeholder="Asal Bantuan" type="text"
                                                class="form-control @error('asal') is-invalid @enderror" id="asal"
                                                name="asal" required value="{{ old('asal') }}">
                                            @error('asal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="jumlah" class="form-label">Jumlah</label>
                                            <input placeholder="Jumlah Yang Menerima Bantuan" type="text"
                                                class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                                                name="jumlah" required autofocus value="{{ old('jumlah') }}">
                                            @error('jumlah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="sasaran" class="form-label">Sasaran</label>
                                            <input placeholder="Sasaran Penerima Bantuan" type="text"
                                                class="form-control @error('sasaran') is-invalid @enderror" id="sasaran"
                                                name="sasaran" required autofocus value="{{ old('sasaran') }}">
                                            @error('sasaran')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="status" class="form-label">Status</label>
                                            <input placeholder="Status" type="text"
                                                class="form-control @error('status') is-invalid @enderror" id="status"
                                                name="status" required autofocus value="{{ old('status') }}">
                                            @error('status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
