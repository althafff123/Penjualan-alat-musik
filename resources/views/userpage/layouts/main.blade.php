<!DOCTYPE html>
<html>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet">
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('assets2/images/logo2.png') }}" type="">

    <title>{{ @$title }} - Rock n' Roll Store </title>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('assets2/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('assets2/css/responsive.css') }}" rel="stylesheet" />

    @yield('style')

    <style>
        .navbar .dropdown-item:hover {
            background: transparent
        }
    </style>
</head>

<body class="{{ isset($sub) && $sub ? 'sub_page' : '' }}">
    <div class="hero_area">
        <div class="bg-box">
            <img src="{{ asset('storage/' . $settings->banner_utama) }}" alt="">
        </div>

        <!-- Navbar strat -->
        @include('userpage.partials.navbar')
        <!-- end Navbar -->

        @yield('slider')

    </div>

    @yield('content')

    @include('userpage.partials.footer')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')

    @if ($message = Session::get('alert'))
        <script>
            Swal.fire(
                '',
                '{{ $message }}',
                'success'
            )
        </script>
    @endif
</body>

</html>
