@extends('frontend.master')
@section('title', 'Package')
@php
use Modules\Package\App\Models\Feature;
@endphp
@section('content')
    <!--content body start-->
    <div id="content_wrapper">
        <!--page title Start-->
        <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(assets/images/bg/page_title_bg.jpg);">
            <ul>
                <li><a href="javascript:;">Tour Packages</a></li>
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
                            <!-- <div class="sidebar_search_bar">
                                <form>
                                    <input type="search" placeholder="Search" id="sidebar_search">
                                </form>

                            </div> -->

                            @php
                                $destinations = packageDestinations();
                            @endphp
                            <aside class="widget destination_widget">
                                <h4 class="widget-title">chosse destination</h4>
                                <div class="travel_checkbox_round">
                                @foreach ($destinations as $destination)
                                    <input type="checkbox" id="{{ $destination->id }}" name="destination[]" value="{{ $destination->id }}">
                                    <label for="{{ $destination->id }}">{{ $destination->name }}</label>
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

                            @php
                                $categories = packageCategories();
                            @endphp
                            <aside class="widget category_widget">
                                <h4 class="widget-title">categories</h4>
                                <div class="travel_checkbox_round">
                                    @foreach ($categories as $category)
                                    <input type="checkbox" id="{{ $category->id }}" name="category[]" value="{{ $category->id }}">
                                    <label for="{{ $category->id }}">{{ $category->name }}</label>
                                    @endforeach
                                </div>
                            </aside>


                        </div>
                    </div>
                    <!-- left sidebar end -->
                    <!-- right main start -->
                    <div class="col-lg-9 col-md-9 col-sm-12">

                    @php
                        $packages = packages();
                    @endphp
                            <div class="full_width sorting_places_section">
                                <!--sort_list start -->
                                @foreach($packages as $package)
                                    <div class="sorting_places_wrap  list_sorting_view">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-12 col-sm-12 padding_none">
                                                <div class="thumb_wrape">
                                                <img src="{{ asset(!empty(json_decode($package->image)) ? json_decode($package->image)[0] : 'assets/default-images/images.jpeg') }}" class="img-responsive" alt="package_image" />

                                                </div>
                                            </div>
                                            <div class="col-lg-7 col-md-12 col-sm-12">
                                                <div class="top_head_bar">
                                                    <h4><a href="{{ route('tour.detail', $package->id) }}">{{ $package->name }}</a></h4>
                                                    <span class="time_date"><i class="fa fa-clock-o"></i>{{ $package->duration }}</span>
                                                </div>
                                                <div class="bottom_desc">
                                                    <h5>Starting from<span>{{ $package->price }} /</span>{{ $package->person }} Person</h5>
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
                                                    <div>
                                                        <a href="{{ route('tour.detail', $package->id) }}" class="list_view_details btns">view Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <!--sort_list start end-->


                            </div>
                            <!-- sorting places section -->
                            <!-- pagination section -->
                            
                            <div class="travel_pagination">
                                <ul class="travel_pagination">
                                    @if ($packages->onFirstPage())
                                        <li class="disabled"><a href="#"><i
                                                    class="fa fa-angle-double-left"></i></a></li>
                                    @else
                                        <li><a href="{{ $packages->previousPageUrl() }}"><i
                                                    class="fa fa-angle-double-left"></i></a>
                                        </li>
                                    @endif

                                    @for ($page = max(1, $packages->currentPage() - 2); $page <= min($packages->lastPage(), $packages->currentPage() + 2); $page++)
                                        <li class="{{ $packages->currentPage() == $page ? 'active' : '' }}"><a
                                                href="{{ $packages->url($page) }}">{{ $page }}</a></li>
                                    @endfor

                                    @if ($packages->hasMorePages())
                                        <li><a href="{{ $packages->nextPageUrl() }}"><i
                                                    class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    @else
                                        <li class="disabled"><a href="#"><i
                                                    class="fa fa-angle-double-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <!-- pagination section -->

                        </div>
                    </div><!-- right main start -->
                </div>
            </div>

        </div>
        <!--content body end-->
@endsection
