@extends('dashboard.layouts.main')

@section('layanan', 'active')
@section('container')
    <div class="d-flex align-items-center">
        <div class="fs-2 mx-2">
            <i class="bi bi-envelope-fill"></i>
        </div>

        <h3> Layanan Surat</h3>
    </div>
    <div class="col-12">
        <div class="row ">
            @foreach ($layanan as $layan)
                <div class=" col-12  my-2  ">
                    <a class="d-flex justify-content-between align-items-center p-3 btn-layanan"
                        href="/dashboard/layanan/{{ $layan->kategori }}">
                        <h6 class="text-black font-semibold">
                            <img src="{{ asset('images/layanan/' . $layan['kategori'] . '.svg') }}">
                            <span class="px-2">{{ $layan->nama_layanan }} </span>
                        </h6>
                        <span data-feather="chevron-right"></span>
                    </a>
                </div>
            @endforeach
        </div>
        </section>
    </div>
@endsection
