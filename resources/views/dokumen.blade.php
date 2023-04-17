@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 widh">

                <div class="card-body mt-3">
                    <h3>Dokumen Desa Tanjungkarang</h3>
                    <h6>Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
                </div>

                <div class="card">
                    <div class="table-responsive col-lg-auto">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama File</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pdf as $pdf)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pdf->judul }}</td>
                                        <td>{{ $pdf->deskripsi }}</td>
                                        <td><a href="{{ asset('storage/' . $pdf->file) }}">
                                                <button class="btn btn-success" type="button"> Download</button>
                                            </a></td>
                                        <td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
