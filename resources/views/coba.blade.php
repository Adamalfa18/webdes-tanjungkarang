<H1>adam</H1>

<html>

<head>
    {{-- swiper css --}}
    <link rel="stylesheet" href="{{ asset('/css/swiper-bundle.min.css') }}">
    {{-- Css --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <div class="tam">
        <div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
                    <div class="card swiper-slide">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="https://source.unsplash.com/sosial" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name"> Adam Alfarizi</h2>
                            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing eli
                                tempora neque nemo voluptatum. Fugiat fugit il</p>
                            <button class="button"> Show</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="https://source.unsplash.com/sosial" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name"> Adam Alfarizi</h2>
                            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing eli
                                tempora neque nemo voluptatum. Fugiat fugit il</p>
                            <button class="button"> Show</button>
                        </div>
                    </div>
                    <div class="card swiper-slide">
                        <div class="image-content">

                            <div class="card-image">
                                <img src="https://source.unsplash.com/sosial" alt="" class="card-img">
                            </div>
                        </div>
                        <div class="card-content">
                            <h2 class="name"> Adam Alfarizi</h2>
                            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing eli
                                tempora neque nemo voluptatum. Fugiat fugit il</p>
                            <button class="button"> Show</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</body>
{{-- Swiper JS --}}
<script src="{{ asset('/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('/js/script.js') }}"></script>

</html>
