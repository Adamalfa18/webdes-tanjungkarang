@extends('layouts.main')

@section('container')
    <div class="container col-lg-10 mt-5 page1">
        <div class="row justify-content-center mb-5">
            <div class="">
                <h2 class="mb-1"> {{ $post->title }} </h2>

                <p>by. <a href="/?author={{ $post->author->name }}" class="text-decoration-none">{{ $post->author->name }}</a>
                    in
                    <a href="/?category={{ $post->category->slug }}"class="text-decoration-none">
                        {{ $post->category->name }}</a>
                </p>
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-2">
                @endif
                <h4 class="mb-1 mt-3"> {{ $post->title }} </h4>
                <article class="mb-3">
                    {!! $post->body !!}
                </article>

                <div>
                    <a href="/berita" class="btn btn-success"> <span data-feather="arrow-left"></span>Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <article>
    @endsection
