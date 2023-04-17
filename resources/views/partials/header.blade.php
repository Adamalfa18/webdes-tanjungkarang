<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">

        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">

        <div class="carousel-item active">
            @if ($mading->count())
                @if ($mading[0]->image)
                    <img class="bd-placeholder-img carousel-test" src="{{ asset('storage/' . $mading[0]->image) }}"
                        alt="">
                @endif
                <img class="bd-placeholder-img carousel-test" src="https://source.unsplash.com/850x350?sosial"
                    alt="">
            @endif
            <div class="container">
                <div class="carousel-caption text-start">
                    <h1 class="warna">{{ $mading[0]->judul }}</h1>
                    <p>{{ $mading[0]->deskripsi }}</p>

                </div>
            </div>
        </div>
        @foreach ($mading->skip(1) as $mading)
            <div class="carousel-item ">
                <img class="bd-placeholder-img carousel-test" src="{{ asset('storage/' . $mading->image) }}"
                    alt="">
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 class="warna">{{ $mading->judul }}</h1>
                        <p>{{ $mading->deskripsi }}</p>

                    </div>
                </div>
            </div>
        @endforeach
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
