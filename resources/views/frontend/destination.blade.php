@extends('frontend.master')

@section('title', 'Package')


@section('content')
    <!--content body start-->
    <div id="content_wrapper">
        @php
            $general = generalSettings();
        @endphp
        <!--page title start-->
        <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0"
            style="background-image:url(<?php echo file_exists(public_path('storage/' . $general->banner_image)) ? asset('storage/' . $general->banner_image) : ''; ?>);">
            <ul>
                <li><a href="javascript:;">Destination</a></li>
            </ul>
        </div>
        <!--page title end-->
        <div class="clearfix"></div>

        <div class="full_width destinaion_sorting_section">
            <div class="container">
                <div class="row ">
                    <!--  sorting panel End -->
                    <div class="col-lg-12">
                        <div class="full_width sorting_panel">

                            <div>
                            </div>
                        </div>
                    </div><!--  sorting panel End -->



                    <!-- sorting places section -->
                    <div class="full_width sorting_places_section">

                        <div class="row">
                            <!--  place sort start -->
                            @foreach ($destinationdetails as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="sorting_places_wrap">
                                        <div class="thumb_wrape">
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="destination_image" style="height: 300px">
                                        </div>
                                        <div class="bottom_desc">
                                            <h4><a
                                                    href="{{ route('destination.fornt', $item->id) }}">{{ $item->name }}</a><span>${{ $item->price }}</span>
                                            </h4>
                                            {{-- <span class="packs">(178 Packs)</span> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <!--  place sort End -->
                        </div>
                    </div>
                    <!-- sorting places section -->


                    <!-- pagination section -->
                    <div class="full_width pagination_bottom">
                        <ul class="pagination">
                            @if ($destinationdetails->onFirstPage())
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                            @else
                                <li><a href="{{ $destinationdetails->previousPageUrl() }}"><i class="fa fa-angle-double-left"></i></a>
                                </li>
                            @endif

                            @for ($page = max(1, $destinationdetails->currentPage() - 2); $page <= min($destinationdetails->lastPage(), $destinationdetails->currentPage() + 2); $page++)
                                <li class="{{ $destinationdetails->currentPage() == $page ? 'active' : '' }}"><a
                                        href="{{ $destinationdetails->url($page) }}">{{ $page }}</a></li>
                            @endfor

                            @if ($destinationdetails->hasMorePages())
                                <li><a href="{{ $destinationdetails->nextPageUrl() }}"><i class="fa fa-angle-double-right"></i></a></li>
                            @else
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- pagination section -->



                </div>
            </div>

        </div>

    </div>
    <!--content body end-->


@endsection
