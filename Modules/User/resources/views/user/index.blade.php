@extends('frontend.master')
@section('title', 'User Dashboard')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/user-dashboard.css')}}">
@endpush
@section('content')
        <div class="container">
            <div class="row pt-20">
			@include('user::user.partial.side-nav')
			
			<div class="col-md-8">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center" style="background: #fff; margin-bottom: 20px;">
						<div>
							<h4>Profile Details</h4>
						</div>
						
					</div>
					<div class="card-body text-dark">

						<div class="row d-flex text-left">
							<div class="col-md-4">
								<span><b>Name: </b></span>
							</div>
							<div class="col-md-8">
								<p class="ml-3">{{ $users->name }}</p>
							</div>
						</div>

						<div class="row d-flex text-left">
							<div class="col-md-4">
								<span><b>Email: </b></span>
							</div>
							<div class="col-md-8">
								<p class="ml-3">{{ $users->email }}</p>
							</div>
						</div>

                        <div class="row d-flex text-left">
							<div class="col-md-4">
								<span><b>Phone Number: </b></span>
							</div>
							<div class="col-md-8">
                                @if(isset($users->phone))
								<p class="ml-3">{{ $users->phone }}</p>
                                @else
                                <p class="ml-3" style="color: #adadad;">Update your phone number</p>
                                @endif
							</div>
						</div>

                        <div class="row d-flex text-left">
							<div class="col-md-4">
								<span><b>Address: </b></span>
							</div>
							<div class="col-md-8">
                                @if(isset($users->address))
								<p class="ml-3">{{ $users->address }}</p>
                                @else
                                <p class="ml-3" style="color: #adadad;">Update your address</p>
                                @endif
							</div>
						</div>
						<br>

                        <div class="row d-flex text-left">
							<div class="col-md-4">
							</div>
							<div class="col-md-8">
                            <a class="btn-travel btn-yellow" href="{{ route('user.edit', $users->id)}}">Edit Profile</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
