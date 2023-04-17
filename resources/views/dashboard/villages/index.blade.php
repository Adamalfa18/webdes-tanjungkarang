@extends('dashboard.layouts.main')
@section('potensi-desa', 'active')
@section('container')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Potensi Desa</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-auto" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="/dashboard/villages/create" class="btn btn-primary mb-3">Careate New post</a>
    <div class=" card col-lg-auto">
        <div class="table-responsive col-lg-auto">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($village as $village)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $village->title }}</td>
                            <td>{{ $village->potential->name }}</td>
                            <td>
                                <a href="/dashboard/villages/{{ $village->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                <a href="/dashboard/villages/{{ $village->slug }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                <form action="/dashboard/villages/{{ $village->slug }}" method="post"
                                    class="d-inline">
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
