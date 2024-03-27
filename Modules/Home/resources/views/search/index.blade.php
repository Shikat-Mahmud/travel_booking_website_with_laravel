@extends('frontend.master')

@section('title', 'Package')


@section('content')
    <!--content body start-->
    <div id="content_wrapper">
        <!--page title Start-->
        <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(assets/images/bg/page_title_bg.jpg);">
            <ul>
                <li><a href="javascript:;">Search Package</a></li>
            </ul>
        </div>
        <!--page title end-->
        <div class="clearfix"></div>

        <div class="full_width destinaion_sorting_section">
            <div class="container">
                <div class="row space_100">

                    <!-- left sidebar start -->
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="travelite_left_sidebar">
                            <div class="sidebar_search_bar">
                                <form>
                                    <input type="search" placeholder="Search" id="sidebar_search">
                                </form>

                            </div>
                            <aside class="widget destination_widget">
                                <h4 class="widget-title">chosse destination</h4>
                                <div class="travel_checkbox_round">
                                    @foreach($destinations as $destination)
                                        <input type="checkbox" id="{{ $destination->name }}">
                                        <label for="{{ $destination->name }}">{{ $destination->name }}</label>
                                    @endforeach

                                </div>

                            </aside>

                            <aside class="widget widget_filter">
                                <h4 class="widget-title">filter by price</h4>
                                <div class="price_filter_slider">
                                    <div id="slider"></div>
                                    <p class="range_text">
                                        <label for="amount">Price range:</label>
                                        <input type="text" id="amount" readonly>
                                    </p>
                                </div>
                            </aside>

                            <aside class="widget category_widget">
                                <h4 class="widget-title">categories</h4>
                                <div class="travel_checkbox_round">
                                    <input type="checkbox" id="default">
                                    <label for="default">default</label>

                                    @foreach($categories as $category)

                                        <input type="checkbox" id="{{ $category->name }}">
                                        <label for="{{ $category->name }}">{{ $category->name }}</label>
                                    @endforeach


                                </div>

                            </aside>

                        </div>
                    </div>
                    <!-- left sidebar end -->

                    <!-- right main start -->
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <div class="tour_packages_right_section left_space_40">


                            <!--  sorting panel End -->

                            <!-- sorting places section -->

                            <div class="full_width sorting_places_section">
                                <!--sort_list start -->
                                @if($search_packages != '')
                                @foreach($search_packages as $package)
                                    <div class="sorting_places_wrap  list_sorting_view">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-12 col-sm-12 padding_none">
                                                <div class="thumb_wrape">
                                                    <a href="{{ route('tour.detail', $package->id) }}">
                                                        <img src="{{ asset(!empty(json_decode($package->image)) ? json_decode($package->image)[0] : 'assets/default-images/images.jpeg') }}" width="240" height="220" class="img-responsive" alt="package_image" />
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                <div class="top_head_bar">
                                                    <h4><a href="{{ route('tour.detail', ['id', $package->id ]) }}">{{ $package->name }}</a></h4>
                                                    <span class="time_date"><i class="fa fa-clock-o"></i>{{ $package->duration }}</span>
                                                </div>
                                                <div class="bottom_desc">
                                                    <h5>Starting from<span>{{ $package->price }} /</span>{{ $package->person }} Person</h5>
                                                    <!-- desc icons Start-->
                                                    <ul class="sort_place_icons">
                                                        <li><i class="fa fa-car"></i> transports</li>
                                                        <li><i class="fa fa-plane"></i> flights</li>
                                                        <li><i class="fa fa-binoculars"></i> sight seeing</li>
                                                        <li><i class="fa fa-cutlery"></i> food</li>
                                                        <li><i class="fa fa-building-o"></i> hotels</li>
                                                    </ul>
                                                    <!-- desc icons End-->
                                                    <div>
                                                        <a href="{{ route('tour.detail', $package->id) }}" class="list_view_details btns">view Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--sort_list start end-->
                                @else
                                    <h1 class="text-center opacity-75">Not found any package for search</h1>
                                @endif

                            </div>
                            <!-- sorting places section -->
                            <!-- pagination section -->
                            @if(!empty($search_packages))
                            <div class="full_width pagination_bottom">
                                <ul class="pagination">
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                </ul>
                            </div>
                                <!-- pagination section -->
                            @endif
                        </div>
                    </div>
                    <!-- right main start -->
                </div>
            </div>

        </div>
        <!--content body end-->
@endsection
