@extends('dashboard.layouts.main')
@section('kelola-berita', 'active')
@section('berita', 'active')


@section('container')
    <div class="row mb-5 py-3">
        <div class="col-lg-8">
            <h2 mb-3> {{ $post->title }} </h2>
            <a href="/dashboard/posts" class="btn btn-success"> <span data-feather="arrow-left"></span> Kembali</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span>
                Ubah</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span
                        data-feather="x-circle"></span>Hapus</button>
            </form>
            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                    alt="{{ $post->category->name }}" class="img-fluid mt-3">
            @endif
            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
@endsection
