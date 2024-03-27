@extends('frontend.master')

@section('title', 'Package')


@section('content')
 <!--content body start-->
 <div id="content_wrapper"> 
    @php
        $general = generalSettings();
    @endphp
    <!--page title start-->
    <div class="page_title" data-stellar-background-ratio="0" data-stellar-vertical-offset="0" style="background-image:url(<?php echo file_exists(public_path('storage/' . $general->banner_image)) ? asset('storage/' . $general->banner_image) : ''; ?>);">
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
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class=" full_width destination_box_wrapper">
                      <img src="{{ asset('storage/' . $indexData->image) }}" class="img-responsive" alt="destination" style="height: 400px">
                      <div class="full_width offer_inner_desc">
                        <div class="desc_left_inner"><a href="">{{$indexData->name}} /<span>{{$indexData->city}}</span></a></div>
                        <div class="desc_right_inner">${{$indexData->price}} <span>7days</span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class=" full_width destination_box_wrapper">
                      <p>{{$indexData->short_description}}</p>
                      <p>{!!$indexData->long_description!!}</p>
                      </div>
                    </div>
                  </div>
                  
               <!--  place sort End -->  	  
           </div>
       </div>
         <!-- sorting places section -->

       
  
       
      </div>
    </div>
  
    </div>

  </div>
  <!--content body end--> 


@endsection
