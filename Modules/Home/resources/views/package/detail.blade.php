@extends('frontend.master')
@section('title', 'Tour Detail')
@section('content')
@php
use Modules\Package\App\Models\Feature;
@endphp
    <div id="content_wrapper">
        <!--page title Start-->
        @php
            $general = generalSettings();
        @endphp
        <!--page title start-->
        <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
            style="background-image:url(<?php echo file_exists(public_path('storage/' . $general->banner_image)) ? asset('storage/' . $general->banner_image) : ''; ?>);">
            <ul>
                <li><a href="javascript:;">Tour Details</a></li>
            </ul>
        </div>
        <!--page title end-->
        <div class="clearfix"></div>

        <div class="full_width destinaion_sorting_section">
            <div class="container">
                <div class="row space_100">

                    <!-- left sidebar start -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="travelite_left_sidebar_second">
                            <div class="sidebar_search_bar">
                                <form>
                                    <input type="search" placeholder="Search" id="sidebar_search">
                                </form>

                            </div>

                            <aside class="widget similar_pacakges">
                                <h4 class="widget-title">similar packages</h4>
                                <div class="widgett text_widget">
                                    <div class="image_holder text-start">
                                        <h6><a href="#">{{ $package->name }}</a></h6>
                                        <h4>{{ $package->price }}/<span>{{ $package->person }}</span></h4>
                                        <hr>
                                    </div>
                                </div>

                            </aside>

                        </div>
                    </div>
                    <!-- left sidebar end -->
                    <!-- right main start -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="tour_packages_right_section left_space_40">
                            <div class="tour_packages_details_top">

                                <div class="top_head_bar">
                                    <h4>{{ $package->name }}</h4>
                                </div>

                                <div class="bottom_desc">
                                    <h5 class="starting_text">Starting from<span>{{ $package->price }} /</span>{{ $package->person }}</h5>
                                    <span class="time_date"><i class="fa fa-clock-o"></i>{{ $package->duration }}</span>
                                </div>

                                <h5 class="includes_text">Features:</h5>

                                <div class="row">
                                    <div class ="col-lg-6 top_icons_part">
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
                                    </div>
                                </div>


                            </div>
                            <!-- slider start -->
                            <div class="package_details_slider">
                                <div id="package_details_slider" class="owl-carousel owl-theme">
                                    @foreach(json_decode($package->image) as $image)
                                        <div class="item"><img src="{{ asset($image) }}" alt="slide"></div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- slider end -->

                            <!-- Booking area Start-->
                            <div class="booking_area_section">
                                <p>{{ strip_tags($package->description) }}</p>
                                <div class=" full_width booking_form_bg">
                                    <div class="main_content_form d-flex">
                                        <!-- tab_search form start -->
                                        <form action="{{ route('book.store', $package->id) }}" method="POST">
                                            @csrf

                                            <div class="pullleft col-md-4">
                                                <label>Person <sub class="opacity-50">(Max)</sub></label>
                                                <input type="text" value="{{ $package->person }}" readonly>
                                            </div>

                                            <div class="pullleft col-md-4">
                                                <label>Price <sub class="opacity-50">(Per person)</sub></label>
                                                <input type="text" value="${{ $package->price }}" readonly>
                                            </div>

                                            <div class="row">
                                                <div class="pullleft submit_field">
                                                    <button class="btn-travel btn-green btns" type="submit">BOOK NOW</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- tab_search form End -->
                                    </div>

                                </div>

                            </div>
                            <!-- Booking area End -->

                            <!-- package tabs start -->
                            <div class="full_width travelite_middle_tabs" id="travelite_middle_tabs">
                                <div class="pcg_tabs_panel">
                                    <ul>
                                        <li> <a href="#tab_search_1">More Infomation</a></li>

                                        <li> <a href="#tab_search_3" class="">Review</a></li>
                                    </ul>
                                </div>
                                <!--  tab content start -->
                                <div id="tab_search_1" class="tab_details_part">

                                    <p>There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum available, but the joy have suffered alteration in some format, by injected humour.  There are many variations of passages of Lorem Ipsum.</p>


                                      @if(!empty(json_decode($package->tour_plan)))
                                        @php
                                            $plans = json_decode($package->tour_plan)
                                        @endphp

                                        @foreach($plans as $plan)
                                                <div class="inner_content">
                                                    <div class="day_title">{{ $plan->title  }}</div>
                                                    <p>{{ $plan->description }}</p>
                                                </div>
                                        @endforeach
                                       @endif



                                    </div>
                                    <!--  tab content End -->

                                    <!--  tab content start -->
                                    <div id="tab_search_3" class="tab_details_part">
                                        <div class="container">
                                            <h4>Reviews</h4>
                                            <form action="{{ route('review.store', ['package' => $package->id]) }}" method="post">
                                                @csrf
                                                <div class="col-md-12 my-2">
                                                    <label for="rating">Rating (Max 5):</label>
                                                    <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" required>
                                                </div>

                                                <div class="col-md-12 my-2">
                                                    <label for="comment">Comment:</label>
                                                    <textarea name="comment"  class="form-control" id="comment" rows="4" required></textarea>
                                                </div>
                                                <br>

                                                <div class="col-md-12 my-2">
                                                    <button type="submit" class="btn-travel btn-green">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- all reviews -->

                                        @foreach ($package->reviews->sortByDesc('created_at') as $review)

                                            <div class="inner_content">
                                                <div class="day_title">
                                                    <div class="d-flex flex-start align-items-center">
                                                        @if(isset($review->user->photo))
                                                            <img class="rounded-circle shadow-1-strong me-3" src="{{ asset('storage/' . $review->user->photo) }}" alt="avatar" width="60" height="60" />
                                                        @else
                                                            <img class="rounded-circle shadow-1-strong me-3" src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="avatar" width="60" height="60" />
                                                        @endif

                                                        <div>
                                                            <h6 class="fw-bold mb-1" style="color: #563D7C;">{{ $review->user->name }}</h6>
                                                            <p class="text-muted small mb-0">
                                                                Published on - {{ $review->created_at->format('d/M/Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span>
                                            @php
                                                $rating = $review->rating;
                                        @endphp

                                        <span style="font-weight: bold;">Ratings: </span>

                                        @for($i = 1; $i <= 5; $i++)
                                                    @if($rating >= $i)
                                                        <i class="fas fa-star" style="color: #FDC543;"></i>
                                                    @elseif($rating < $i && $rating > ($i - 1))
                                                        <i class="fas fa-star-half-alt" style="color: #FDC543;"></i>
                                                    @else
                                                        <i class="far fa-star" style="color: #FDC543;"></i>
                                                    @endif
                                         @endfor
                                            </span>

                                            <p class="mt-1 p-3">{{ $review->comment }}</p>
                                        </div>
                                    @endforeach
                                    <!-- all reviews end -->

                                </div>
                                <!--  tab content End -->


                            </div>
                            <!-- package tabs End -->


                        </div><!-- right main start -->
                    </div> <!-- col-lg-9-end -->
                </div><!--  row main -->
            </div> <!-- container -->
        </div> <!-- main wrapper -->
        <!--content body end-->
    </div>
@endsection
