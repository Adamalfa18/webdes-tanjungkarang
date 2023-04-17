@extends('dashboard.layouts.main')
@section('potensi-desa', 'active')
@section('container')


    <div class="row mb-5 py-3">
        <div class="col-lg-8">
            <h2 mb-3> {{ $village->title }} </h2>
            <a href="/dashboard/villages/" class="btn btn-success"> <span data-feather="arrow-left"></span> Back </a>
            <a href="/dashboard/villages/{{ $village->slug }}/edit" class="btn btn-warning"> <span
                    data-feather="edit"></span>
                Edit</a>
            <form action="//dashboard/villages/{{ $village->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                        data-feather="x-circle"></span>Delete</button>
            </form>
            @if ($village->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $village->image) }}" alt="{{ $village->potential->name }}"
                        class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $village->potential->name }}"
                    alt="{{ $village->potential->name }}" class="img-fluid mt-3">
            @endif
            <article class="my-3 fs-5">
                {!! $village->body !!}
            </article>
        </div>
    </div>
@endsection
