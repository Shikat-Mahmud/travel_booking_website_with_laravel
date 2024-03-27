<!DOCTYPE html>
<html lang="en">
<title>Reset password</title>
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

    <link rel="stylesheet" href="{{ asset('/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/assets/plugins/animation/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
</head>
<body>
<x-auth-session-status class="mb-4" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
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
                            </a> </div>
<h3 class="mb-4">Reset Password</h3>
       <div class="mt-4">
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #FF0000;" />
        </div>
        <br>
<button class="btn btn-primary mb-4 shadow-2"> {{ __('Email Password Reset') }}</button>
<p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}">Signup</a></p>
</div>
</div>
</div>
</div>
</form>
<script src="{{ asset('/assets/js/vendor-all.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="{{ asset('/assets/js/pcoded.min.js') }}" type="ac2db66612bdc379950ac657-text/javascript"></script>
    <script src="../../../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="ac2db66612bdc379950ac657-|49" defer></script>
</html>

















