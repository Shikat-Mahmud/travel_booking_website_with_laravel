<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content />
    <meta name="keywords" content />
    <meta name="author" content="CodedThemes" />

    @if (isset(generalSettings()->favicon))
    <link rel="icon" href="{{ asset('storage/' . generalSettings()->favicon) }}" type="image/x-icon">
    @else
    <link rel="icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">
    @endif

    <script src="https://kit.fontawesome.com/1ba46b643f.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="{{ asset('assets/fonts/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/feather/css/feather.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/animation/css/animate.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/notification/css/notification.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>

<body>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="auth-wrapper">
            <div class="auth-content">
                <div class="auth-bg">
                    <span class="r"></span>
                    <span class="r s"></span>
                    <span class="r s"></span>
                    <span class="r"></span>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-4">
                        <a href="{{route('home.index')}}">
                                @if(isSet($general->logo))
                                <img class="img-fluid logo-dark" style="width: auto !important; height: 80px !important; padding: 5px !important; margin-top: 10px !important;" src="{{ asset('storage/' . $general->logo) }}" alt="Logo">
                                @else
                                <img class="img-fluid logo-dark" style="width: auto !important; height: 80px !important; padding: 5px !important; margin-top: 10px !important;" src="{{ asset('images/SEO_Expate_logo2.png')}}" alt="Logo">
                                @endif
                            </a>
                        </div>
                        <h3 class="mb-4">Sign up</h3>
                        <!-- Name -->
                        <div>
                            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" style="color: #FF0000;"/>
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">

                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #FF0000;" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color: #FF0000;" />
                        </div>
                        <br>

                        <button class="btn btn-primary shadow-2 mb-4">Sign up</button>
                        <p class="mb-0 text-muted">Allready have an account? <a href="{{ route('login') }}"> Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script src="{{ asset('/assets/js/vendor-all.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="ac266612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/js/menu-setting.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/js/pcoded.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/amcharts.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/gauge.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/serial.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/light.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/pie.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/ammap.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/usaLow.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/radar.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/plugins/amchart/js/worldLow.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>

    <script src="{{ asset('/assets/plugins/notification/js/bootstrap-growl.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>

    <script src="{{ asset('/assets/js/pages/dashboard-custom.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="../../../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="ac2db66612bdc379950ac657-|49" defer></script>

</html>
