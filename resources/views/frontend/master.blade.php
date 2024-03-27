<!DOCTYPE html>

<html lang="en">

<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Travelite - Tours and Travels Online Booking HTML" />
    <meta name="keywords" content="Travel, html template, Travelite template">
    <meta name="author" content="Kamleshyadav" />
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- font-awsome-link -->
    <link rel="stylesheet" href="{{ asset('frontend/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <!--srart theme style -->
    <link href="{{ asset('frontend/assets/css/main.css')}}" rel="stylesheet" type="text/css" />

    @if (isset(generalSettings()->favicon))
        <link rel="icon" href="{{ asset('storage/' . generalSettings()->favicon) }}" type="image/x-icon" />
    @else
        <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon" />
    @endif
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />

    {{-- toaster --}}
    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}" />


    @stack('styles')
</head>

<body class="travel_home">

<!--Page main section start-->
<div id="travel_wrapper">

    @include('frontend.partial.header')

    @yield('content')

    @include('frontend.partial.footer')


    <!-- Bootstrap CDN -->
    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.js') }}" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.bundle.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--main js file start-->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.bundle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/datetimepicker/jquery.datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/parallax/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/owl/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/isotope/jquery.isotope.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/bxslider/jquery-bxslider.js') }}"></script>
    <!-- pie chart js -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/pie-circle/circles.js') }}"></script>
    <!-- pie chart js -->
    <!--counter js-->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/counter/jquery.countTo.js') }}"></script>
    <!--counter js-->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/counter/jquery.countdown.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/jquery.themepunch.revolution.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/revolution.extension.navigation.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/revolution.extension.slideanims.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/revolution.extension.actions.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/revolution/js/revolution.extension.parallax.min.js') }}">
    </script>
    <!-- REVOLUTION JS FiLES -->
    <!-- video_popup -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/video-popup/jquery.magnific-popup.js') }}">
    </script>
    <!-- video_popup -->
    <!-- slick slider -->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/slick/jquery-migrate-1.2.1.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/plugin/slick/slick.min.js') }}"></script>
    <!-- slick slider -->
    <!-- video player js -->
    <script src="{{ asset('frontend/assets/js/plugin/video_player/mediaelement-and-player.min.js') }}"></script>
    <!-- video player js -->
    <!-- pricefilter -->
    <script src="{{ asset('frontend/assets/js/plugin/jquery-ui/jquery-ui.js') }}"></script>
    <!-- pricefilter-->
    <script type="text/javascript" src="{{ asset('frontend/assets/js/custom.js') }}"></script>
    <!--main js file end-->

    <!-- Toastr JS -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": 5000,
            "extendedTimeOut": 1000,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "maxOpened": 3
        };

        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
        @elseif(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
        @endif
    </script>
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });

    </script>
@stack('scripts')

</body>

</html>
