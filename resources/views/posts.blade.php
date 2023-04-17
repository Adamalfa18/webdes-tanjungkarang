@extends('layouts.main')

@section('container')
    <div class="container">
        {{-- Berita Desa --}}
        <div class="mt-5">
            <h4>Berita Desa Tanjungkarang</h4>
            <h6>Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
        </div>
        <form action="/berita">
            <div class="card mb-4 ">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <div class="card-header">Cari Berita</div>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari..." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-primary" id="button-search" type="submit">Cari</button>
                    </div>
                </div>
        </form>
    </div>
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-12">
            <!-- Featured blog post-->
            <div class="card col-me-4 mb-4">
                @if ($posts->count())
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4">
                        <!-- Blog post-->
                        <div class="card mb-4">
                            <div class="position-absolute px-3 py-2 " style="background-color: rgba(0,0,0,0.7)">
                                <a href="berita/?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">
                                    {{ $post->category->name }}</a>
                            </div>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                    class="img-fluid">
                            @else
                                <img src="https://source.unsplash.com/700x350?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p>
                                    <small class="text-muted">
                                        by. <a href="/berita?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text"> {{ $post->excerpt }} </p>
                                <a class="btn btn-primary" href="/berita/{{ $post->slug }}">Baca Sekarang →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- Side widgets-->
        {{-- @include('partials.nav') --}}
    </div>
    </div>
@else
    <p class="text-center fs-4">Berita Tidak Tersedia</p>
    @endif
@endsection
