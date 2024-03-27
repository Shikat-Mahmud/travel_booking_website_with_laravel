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
        <li><a href="javascript:;">{{ $indexData->title }}</a></li>
      </ul>
    </div>
    <!--page title end-->
    <div class="clearfix"></div>
    
	<div class="container py-4">
		{!!$indexData->content!!}
	</div>

  </div>
  <!--content body end--> 


@endsection
