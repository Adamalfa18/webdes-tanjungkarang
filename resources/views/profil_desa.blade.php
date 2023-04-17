@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-lg-12 col-md-12">
                <div class="card-header pt-5">
                    <h4 class="card-title">Profil Desa Tanjungkarang</h4>
                    <h6>Desa Tanjungkarang, Cigalontang - Tasikmalaya</h6>
                </div>
                <div class="card-content bg-white p-5">

                    <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                        @foreach ($kategori_profil as $kategori)
                            @if ($kategori->slug == 'visi-misi')
                                <a class="list-group-item list-group-item-action active" id="{{ $kategori->slug }}-list"
                                    data-bs-toggle="list" href="#{{ $kategori->slug }}"
                                    role="tab">{{ $kategori->nama }}</a>
                            @else
                                <a class="list-group-item list-group-item-action" id="{{ $kategori->slug }}-list"
                                    data-bs-toggle="list" href="#{{ $kategori->slug }}"
                                    role="tab">{{ $kategori->nama }}</a>
                            @endif
                        @endforeach
                    </div>
                    <div class="tab-content text-justify">
                        @foreach ($profil_desa as $profil)
                            @if ($profil->category_profil->slug == 'visi-misi')
                                <div class="tab-pane fade show active" id="{{ $profil->category_profil->slug }}"
                                    role="tabpanel" aria-labelledby="{{ $kategori->slug }}-list">
                                    <img src="{{ asset('storage/' . $profil->image) }}" class="p-5">
                                    <h4>{{ $profil->nama }}</h4>
                                    {!! $profil->deskripsi !!}
                                </div>
                            @endif
                            <div class="tab-pane fade show " id="{{ $profil->category_profil->slug }}" role="tabpanel"
                                aria-labelledby="{{ $kategori->slug }}-list">
                                <img src="{{ asset('storage/' . $profil->image) }}" class="p-5">
                                <h4>{{ $profil->nama }}</h4>
                                {!! $profil->deskripsi !!}
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
