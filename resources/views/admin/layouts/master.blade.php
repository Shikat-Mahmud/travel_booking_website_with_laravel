<!DOCTYPE html>
<html lang="en">


<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    @if (isset(generalSettings()->favicon))
    <link rel="icon" href="{{ asset('storage/' . generalSettings()->favicon) }}" type="image/x-icon">
    @else
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    @endif

    {{-- datatable --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/plugins/jsvectormap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/css2.css') }}">

    <link rel="stylesheet" href="{{ asset('/fonts/tabler-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/fonts/material.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style-preset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/animation/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/notification/css/notification.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap-iconpicker.min.css') }}"/>

    <link rel="stylesheet" href="{{ asset('/css/toastr.min.css') }}">

    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    @stack('styles')
</head>

@include('admin.partials.header')
@yield('content')
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-iconpicker.bundle.min.js') }}"></script>
<script src="{{ asset('js/ajax/jquery.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>


{{-- sweetalert --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    document.querySelectorAll('.btnDelete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this!",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-secondary"
                    },
                    confirm: {
                        text: "Delete",
                        value: true,
                        visible: true,
                        className: "btn btn-danger"
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    this.closest('.deleteForm').submit();
                }
            });
        });
    });
</script>


{{-- datatable --}}
<script>
    $(document).ready(function () {
        $("#example").DataTable();
    });
</script>
{{-- backbutton --}}
<script>
    function goBack() {
        window.history.back();
    }
</script>
{{-- datatable --}}
<script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>
<script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>

<script data-cfasync="false" src="{{ asset('/js/plugins/email-decode.min.js') }}"></script>
<script src="{{ asset('/js/plugins/apexcharts.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/jsvectormap.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/world.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/world-merc.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/pages/dashboard-sales.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/popper.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/bootstrap.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/simplebar.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/fonts/custom-font.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/pcoded.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/feather.min.js') }}" type="90f9e57eb6fda3c0ef534197-text/javascript"></script>
<script src="{{ asset('/js/plugins/rocket-loader.min.js') }}" data-cf-settings="90f9e57eb6fda3c0ef534197-|49" defer></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>

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

    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}");
    @elseif(Session:: has('error'))
    toastr.error("{{ Session::get('error') }}");
    @elseif(Session:: has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @elseif(Session:: has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

@stack('scripts')
</body>

</html>
