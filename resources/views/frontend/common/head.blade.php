<head>
    <title>{{ getSetting('app-name')->value }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- FavIcon CSS -->
    <link rel="icon" href="{{ asset('frontend/assets/img/logo.png') }}" type="image/gif" sizes="16x16">

    <!--Google Fonts CSS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!--Font Awesome Pro Icon CSS-->
    <link href="{{ asset('frontend/vendor/fontawesome-pro/css/all.min.css') }}" rel="stylesheet" type="text/css"/>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> --}}

    <!--Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Carousel Slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">

    <!-- Main Style CSS  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/style.css') }}">

    <!-- Loader css & js  -->
    <script src="{{ asset('admin/vendor/loader/dist/main.js') }}" type="text/javascript"></script>
    <link href="{{ asset('admin/vendor/loader/dist/main.css') }}" type="text/css" rel="stylesheet"/>

    <!-- Meta Data  -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Page css  -->
    @yield('css')
    <style>
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(255, 255, 255); /* Slightly transparent background */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* visibility: hidden; */
        }
        .playlist-thumbnail-1{
            left: 5px;
            top: 5px;
        }
        .playlist-thumbnail-2{
            left: 10px;
            top: 10px;
        }
        .list-group-item.active-item {
            z-index:2;
            color:#fff;
            background-color:#4e00009c;
            border-color:#4e00009c
        }
    </style>
</head>
