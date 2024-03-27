@extends('frontend.master')
@section('title', 'Home')
@section('content')
@php
use Modules\Package\App\Models\Feature;
@endphp

    <!--content body start-->
    <div id="content_wrapper">
        <div class="clearfix"></div>
        <!-- Home first slider start -->
        <div class="slider_tab_main">
            <div class="full_width home_slider">
                <div class="example">
                    <article class="content" style="width:100%; float:left;">
                        <div id="rev_slider_116_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="layer-animations" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                            <!-- START REVOLUTION SLIDER 5.0.7 auto mode -->
                            <div id="rev_slider_116_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
                                <ul style="width:100% !important;">
                                    <!-- SLIDE  -->
                                    @foreach($sliders as $slider)
                                        <li data-index="rs-391" data-transition="parallaxhorizontal" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default" data-rotate="0" data-saveperformance="off" data-title="Smooth Mask" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="{{ asset($slider->image) }}" alt="slide2" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />
                                            <!-- LAYERS -->
                                            <!-- LAYER NR. 1 -->
                                            <div class="slider_left_part">
                                                <div class="tp-caption NotGeneric-Title slideheading  tp-resizeme" id="slide-391-layer-1" data-x="100"
                                                     data-hoffset="" data-y="center" data-voffset="-30" data-width="['auto','auto','auto','auto']"
                                                     data-height="['auto','auto','auto','auto']" data-transform_idle="o:1;"
                                                     data-transform_in="x:left;s:2000;e:Power4.easeInOut;"
                                                     data-transform_out="s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                                                     data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-start="1000"
                                                     data-splitin="none" data-splitout="none" data-responsive_offset="on"
                                                     style=" z-index: 8;">
                                                    <h3>{{ substr($slider->title, 0, 22) }}{{ strlen($slider->title) >= 22 ? '...' : '' }}</h3>
                                                    <p>
                                                        {!! substr($slider->description, 0, 32)  !!}
                                                        {!! strlen($slider->description) >= 32  ? '<br/>' : '' !!}
                                                        {!! substr($slider->description, 33, 66) !!}
                                                    </p>
                                                    <div class="slider_buttons">
                                                        <a href="#"  style=" border: 1px solid #fdb714;" class="large_slide_btn">View more</a>
                                                        <a href="#"  style=" border: 1px solid #fdb714;" class="large_slide_btn">book now</a>

                                                    </div>

                                                </div>
                                                <!-- LAYER NR. 3 -->

                                                <!-- LAYER NR. 4 -->
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- END REVOLUTION SLIDER -->
                    </article>
                </div>
                <!-- section end -->
            </div>
            <!-- Home first slider End -->
            <div class="home_tabs_search">
                <div class=" slider_content_wrap">
                    <div class="container">
                        <!-- first content_start -->
                        <div id="building_search" class="main_content_form">
                            <!-- tab_search form start -->
                            <form action="{{ route('header.search') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-5 float-start">
                                        <label for="location" class="fs-4">Destination</label>
                                        <input type="text" class="form-control" value="{{ old('location') }}" placeholder="Enter Destination" name="location" />
                                        @error('location')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="float-start col-md-5">
                                        <label for="person" class="fs-4">Person</label>
                                        <select name="person" class="form-select" title="Person">
                                            <option value="1" {{ old('person') == 1 ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ old('person') == 2 ? 'selected' : '' }}>2</option>
                                            <option value="4" {{ old('person') == 4 ? 'selected' : '' }}>4</option>
                                            <option value="6" {{ old('person') == 6 ? 'selected' : '' }}>6</option>
                                            <option value="8" {{ old('person') == 8 ? 'selected' : '' }}>8</option>
                                        </select>
                                        @error('person')
                                        <div class="text-danger">{{ $message }} </div>
                                        @enderror
                                    </div>
                                    <div class="float-start col-md-2" style="margin-top: 20px; color: white">
                                        <label for="person" class="fs-4"></label>
                                        <input type="submit" class="searchBtn" value="Search">
                                    </div>
                                </div>
                            </form>
                            <!-- tab_search form End -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- slider_tab_main end -->

        <!-- latest package section start -->
        <div class="full_width travelite_world_section">
            <div class="container">
                <div class="row">
                    <div class="travelite_destinaion_main">
                        <div class="heading_team">
                            <h3>Latest Packages</h3>
                            <p>Create stunning pages with our powerful admin panel. Functionality and usability combine. Travelllers Deals and Offers on Hotels, Vacation Packages, Flights, Cruises and Car Rentals</p>
                        </div>
                        <div class="row">
                            @foreach($tour_packages as $package)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="sorting_places_wrap grid_sorting">
                                        <div class="top_head_bar">
                                            <h4><a href="{{ route('tour.detail', $package->id) }}">{{ $package->name }}</a></h4>
                                            <span class="time_date"><i class="fa fa-clock-o"></i>{{ $package->duration }}</span>
                                        </div>

                                        <div class="thumb_wrape">
                                            <a href="{{ route('tour.detail', $package->id) }}">
                                                <img src="{{ asset(!empty(json_decode($package->image)) ? json_decode($package->image)[0] : 'assets/default-images/images.jpeg') }}" height="220" alt="Grid pic" />
                                            </a>
                                        </div>
                                        <div class="bottom_desc">
                                            <h5>Starting from<span>{{ $package->price }} /</span>{{ $package->person }}</h5>
                                            <!-- desc icons Start-->
                                            <ul class="sort_place_icons">
                                                @if (isset($package->features))
                                                    @foreach (json_decode($package->features) as $featureId)
                                                        @php
                                                            $feature = Feature::find($featureId);
                                                        @endphp
                                                        @if ($feature)
                                                            <li><i class="fa {{ $feature->icon }}"></i> {{ $feature->name }}</li>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </ul>
                                            <!-- desc icons End-->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div> <!-- travelite_destinaion_main end -->

                </div>
            </div>
        </div>
        <!-- latest package section end -->

        <!-- top destination section start -->
        <div class="full_width travelite_world_section">
            <div class="container">
                <div class="row">
                    <div class="travelite_destinaion_main">
                        <div class="heading_team">
                            <h3>Top Destination</h3>
                            <p>Create stunning pages with our powerful admin panel. Functionality and usability combine. Travelllers Deals and Offers on Hotels, Vacation Packages, Flights, Cruises and Car Rentals</p>
                        </div>
                        <div class="row">

                            <!-- first ractangle start -->
                            @foreach ($destination as $item)
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class=" full_width destination_box_wrapper">
                                        @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="img-responsive" alt="destination" style="height: 400px">
                                        @else
                                            <span>No image</span>
                                        @endif
                                        <div class="full_width offer_inner_desc">
                                            <div class="desc_left_inner"><a href="{{ route('destination.fornt', $item->id) }}">{{$item->name}} /<span>{{$item->city}}</span></a></div>
                                            <div class="desc_right_inner">${{$item->price}} <span>7days</span></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!-- first ractangle End -->
                        </div>

                        <div class="full_width destination_button">
                            <a href="{{route('location.fornt')}}" class="black_btn feature_more_btn">more destination</a>
                        </div>
                    </div> <!-- travelite_destinaion_main end -->

                </div>
            </div>
        </div>
        <!-- top destination section End -->


        <div class="full_width travelite_world_section">
            <div class="container">
                <div class="row">

                    <div class="heading_team">
                        <h3>the world by type</h3>
                        <p>Create stunning pages with our powerful admin panel. Functionality and usability combine. Travelllers Deals and Offers on Hotels, Vacation Packages, Flights, Cruises and Car Rentals</p>
                    </div>

                    <div class="full_width rectangle_wrapper">

                        @php
                            $categories = categories();
                        @endphp

                            <!-- ractangle start -->
                        @foreach ($categories as $category)
                            <div class="col_25 ractangle_box_cover">
                                <div class="circle_icon">
                                    <i class="fa {{ $category->icon }} big_circle"></i>
                                </div>
                                <div class="full_width ractangle_inner">
                                    @if (isset($category->image ))
                                        <img src="{{ asset('storage/' . $category->image ) }}" alt="category image"  style="height: 260px; width: 100%; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('frontend/assets/images/Home/BoatHouse.jpg') }}" alt="house">
                                    @endif
                                    <div class="inner_ovelay">
                                        <h4>{{ $category->name }}</h4>
                                        <p>{{ count($category->package) }} tours available</p>
                                    </div>
                                </div>
                                <div class="circle_icon">
                                    <i class="fa fa-arrow-right small_circle"></i>
                                </div>
                            </div>
                        @endforeach
                        <!-- ractangle End -->

                    </div>

                </div>
            </div>
        </div>
        <!-- counter section End -->
        <!-- feature section start -->
        <!-- slider_tab_main end -->
        <div class="full_width travelite_feature_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <div class="feature_box first_box">
                            <h3 class="travelite_heading_feature">features</h3>
                            <p>Create stunning pages with our powerful admin </p>
                        </div>
                    </div>
                    @foreach($features as $feature)
                        <div class="col-lg-3 col-md-3 col-sm-6 feature_box_wrapper">
                            <div class="feature_box p-2">
                                <div class="feature_box_content">
                                    @if(isset($feature->image))
                                        <img src="{{ asset($feature->image) }}" width="140" style="border-radius: 50%" height="140" alt="feature_image" />
                                    @else
                                        <i class="fa fa-usd"></i>
                                    @endif
                                    <h4 class="feature_title">{{ substr($feature->name, 0, 18) }}</h4>
                                </div>
                                <div class="feature_overlay">
                                    <h4>{{ $feature->name }}</h4>
                                    <p>{{ substr($feature->description, 0, 100) }} {{ strlen($feature->description) >= 101 ? '...' : ''  }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- feature section end -->

        <!-- testimonials section start -->
        <div class="full_width testimonials_section_home">
            <div class="container">
                <div class="row">

                    <div class="heading_team pt-50">
                        <h3>customer says </h3>
                        <p>Create stunning pages with our powerful admin panel. Functionality and usability combine. Travelllers Deals and Offers on Hotels, Vacation Packages, Flights, Cruises and Car Rentals</p>
                    </div>
                    <div id="home_testimonials" class="owl-carousel owl-theme">
                        @php
                            $reviews = reviews();
                        @endphp

                        @foreach ($reviews as $review)
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 pad_z">
                                        <div class="main_testimonials_content">
                                            <p>{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 pad_z">
                                        <div class="testimonial_img_part">
                                            @if(isset($review->user->photo))
                                                <img src="{{ asset('storage/' . $review->user->photo) }}" alt="avatar" class="rounded-circle" />
                                            @else
                                                <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" class="rounded-circle" alt="testimonial-thumb">
                                            @endif
                                            <h4>{{ $review->user->name }}</h4>
                                            <!-- <p>HeapsTech, CEO</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!-- testimonials section End -->


        <!-- count-down section start -->

        <div class="full_width counter_section">
            <div class="container">
                <div class="row">

                    @foreach ($states as $state)
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="timer" id="counter1" data-to="{{ $state->value }}" data-delay="100" data-speed="3000">{{ $state->value }}</div>
                            <div class="chart" data-animated="bounceIn" data-delay="100">
                                <div class="percentage-light" data-percent="80" data-color="{{ $state->color }}">
                                    <i class="fa {{ $state->icon }}" style="color: {{ $state->color }};"></i>
                                </div>
                                <div class="counter_title">{{ $state->title }}</div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- count-down section End -->


        <!-- subscribe section start -->
        <div class="full_width home_subscribe_section">
            <div class="icon_circle_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="subscribe_middle_part">
                            <h3>Wanna Know Our Latest Offers and Deals Just Subcscribe Here</h3>
                            <div class="sbuscribe_widget_middle">
                                <form action="{{ route('subscribe.store') }}" method="post" class="subscribe-form">
                                    @csrf
                                    <div class="subscribe_widget_middle">
                                        <input type="email" name="email" placeholder="ENTER YOUR EMAIL ID HERE" class="send_email" required>
                                        <button type="submit" class="submit_subscribe">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- subscribe section End -->
    </div>
    <!--content body end-->
@endsection
