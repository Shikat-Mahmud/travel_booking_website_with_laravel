<!--Header start-->
<header id="header_wrapper">
    <div class="header_top">
        <div class="container">
            <div class="row">
                @php
                    $general = generalSettings();
                @endphp
                <div class="col-md-6 col-sm-6">
                    <p><i class="fa fa-phone"></i> For Support? Call Us: <span>{{ $general->business_number ?? ''  }}</span></p>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="top_menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-globe"></i> Languages</a>
                                <ul class="sub-menu">
                                    <select class="form-select changeLang">
                                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                        <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                        <option value="nl" {{ session()->get('locale') == 'nl' ? 'selected' : '' }}>Dutch</option>
                                    </select>
                                </ul>
                            </li>

                            @if(!Auth::check())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Signup</a></li>
                            @else

                                <li><a href="#">Dashboard</a>
                                    <ul class="sub-menu">

                                        <li>
                                            @if(auth()->user()->role == 'user')
                                                <a href="{{ route('user.index') }}">{{ auth()->user()->name }}</a>
                                            @else
                                                <a href="{{ route('admin.index') }}">{{ auth()->user()->name }}</a>
                                            @endif
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popup form Start -->
    <div class="full_width login_wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-5 col-md-5 col-sm-5 col-lg-offset-6 col-md-offset-6 col-sm-offset-6">
                    <!-- login form start -->
                    <div class="popup_alert_main travelite_login_form">
                        <div class="login_heading">
                            login
                            <span class="close_btn"><i class="fa fa-times"></i></span>
                        </div>
                        <div class="popup_inner">
                            <form>
                                <input type="email" name="emaillogin" placeholder="Email Id"   class="input_login">
                                <input type="password" name="passlogin" placeholder="Password" class="input_login">
                                <input type="checkbox" id="login_check" name="checkbox" class="checkbox_login">
                                <label for="login_check" class="remember_me">Remember me</label>
                                <a href="#" class="forgot_link">Forget password?</a>
                            </form>
                            <div class="have_an_acnt">
                                <p>Dont have an account?  <a href="#">Sign up</a></p>
                            </div>
                            <div class="or_line">
                                <span>(OR)</span>
                            </div>
                            <div class="social_links_login">
                                <ul>
                                    <li class="facebook_login"><a href="#"><i class="fa fa-facebook"></i>Login with facebook</a></li>
                                    <li class="gplus_login"><a href="#"><i class="fa fa-google-plus"></i>Login with Google+</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- login form  End -->
                    <!-- signup form start -->
                    <div class="popup_alert_main travelite_signup_form">
                        <div class="login_heading">
                            signup
                            <span class="close_btn"><i class="fa fa-times"></i></span>
                        </div>
                        <div class="popup_inner">
                            <form class="signup_form">
                                <input type="text" name="emaillogin" placeholder="First Name" class="input_login">
                                <input type="text" name="emaillogin" placeholder="Last Name"  class="input_login">
                                <input type="email" name="emaillogin" placeholder="Email Id"   class="input_login">
                                <input type="password" name="passlogin" placeholder="Password" class="input_login">
                                <input type="password" name="conf passlogin" placeholder="Confirm Password" class="input_login">
                                <input type="checkbox" id="signup_check" name="checkbox" class="checkbox_login">
                                <label for="signup_check" class="remember_me">I agree the Terms of Service, Privacy Policy, Guest
                                    Refund Policy, and Host Guarantee Terms.</label>
                                <input type="submit" value="SIGN UP" class="sub_signup">
                            </form>
                            <div class="or_line">
                                <span>(OR)</span>
                            </div>
                            <div class="social_links_login">
                                <ul>
                                    <li class="facebook_login"><a href="#"><i class="fa fa-facebook"></i>Login with facebook</a></li>
                                    <li class="gplus_login"><a href="#"><i class="fa fa-google-plus"></i>Login with Google+</a></li>
                                </ul>
                            </div>
                            <div class="already_member"> already member? <a href="#">login here</a></div>
                        </div>
                    </div>
                    <!-- signup form  End -->
                </div>
            </div>
        </div>
    </div>
    <!-- popup form  End -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div class="travel_logo">
                        <a href="{{ route('home.index') }}" class="b-brand text-primary">

                            @php
                            $settings = generalSettings()
                            @endphp
                            @if($settings->logo)
                            <img src="{{ asset('storage/' . $settings->logo) }}" class="logo-lg" alt="Logo image"
                                style="max-height: 40px; width: auto; max-width: 100%;">
                            @else
                            <img src="https://codedthemes.com/demos/admin-templates/gradient-able/bootstrap/default/assets/images/logo-white.svg"
                                alt="logo image" class="logo-lg">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-md-10 col-sm-10"> <a href="javascript:;" class="menu-toggle"></a>
                    <div class="main_menu">

              <ul>
			  	<li><a href="{{ route('home.index')}}">Home</a></li>

                            <li><a href="">Tours</a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('location.fornt')}}">Destination</a>
                                        <ul class="sub-menu">
                                            @foreach ($destinationdetails as $item)
                                            <li><a href="{{ route('destination.fornt', $item->id) }}">{{ $item->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('package') }}">Tour Package</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('blog.main') }}">Blog</a></li>
                            <li><a href="{{ route('contact.fornt') }}">Contact</a></li>
                            @foreach ($pages as $page)
                            <li><a href="{{ route('pages.fornt', $page->slug) }}">{{$page->title}}</a></li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header end-->
