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
                <li><a href="javascript:;">Contact Us</a></li>
            </ul>
        </div>
        <!--page title end-->
        <div class="clearfix"></div>

        <div class="full_width tr_contact_map_section">
            <div class="map_main">
                <div id="bigth_googleMap">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3875.659361167987!2d-122.08198268521535!3d37.38274417617852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba7c1f52f14f%3A0x9f7d62d1ad7c2899!2sGolden%20Gate%20Bridge!5e0!3m2!1sen!2sus!4v1646733839950!5m2!1sen!2sus"
                      width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                  </iframe>
                </div>
            </div>
        </div>

        <div class="full_width tr_contact_detais_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if(Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        <div class="conatact_form_ds">
                            <form action="{{ route('contact.send') }}" method="POST">
                                @csrf
                                <input type="text" name="name" placeholder="Name" class="input_c"
                                    required="required" />
                                <input type="email" name="email" placeholder="Email" class="input_c"
                                    required="required" />
                                <input type="text" name="phone" placeholder="Phone" class="input_c"
                                    required="required" />
                                <textarea class="text_area_c" placeholder="Message" name="message"></textarea>
                                <input type="submit" value="Send" class="btn_green" id="form_submit" />
                            </form>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @foreach ($indexData as $item)
                        <div class="address_contact_details">
                            <div class="address_detais_city">
                                {{$item->location}}:
                            </div>
                            <ul>
                                <li>
                                    <i class="fa fa-map-marker"></i>
                                    {{$item->address}}
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    {{$item->email}}
                                </li>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    {{$item->phone}}
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>

    </div>
    <!--content body end-->




@endsection
