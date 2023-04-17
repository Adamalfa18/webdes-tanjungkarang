<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('/css/bootstrappp.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">



    {{-- Trix Editor --}}

    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/apps.css') }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon">


</head>

<body>
    @include('partials.navbar')
    <div class="bg-light" style="padding-top: 7rem">
        <div class="page-content">
            <section>
                @yield('container')
            </section>
        </div>
        @include('partials.footer')


</body>
<script src="{{ asset('/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('/js/pages/dashboard.js') }}"></script>

<script src="{{ asset('/js/pages/horizontal-layout.js') }}"></script>

<script src="{{ asset('/vendors/apexcharts/apexcharts.js') }}"></script>

<!-- Footer-->
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('/js/appearance.js') }}"></script>

<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/popper.js') }}"></script>
<script src="{{ asset('/js/bootstrapp.min.js') }}"></script>
@yield('footer')
@stack('scripts')

</html>
