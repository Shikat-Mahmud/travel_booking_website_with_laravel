@extends('frontend.master')
@section('title', 'Edit Profile')
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
            <h4>Edit Profile</h4>
        </div>
        <div>
            <a href="{{ route('user.index') }}" class="btn-travel btn-yellow"><i class="fas fa-arrow-left mr-2 "></i> Profile Details</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('user.update', ['user' => $users->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                <label for="" class="col-md-4">Name <span
                        class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="text" name="name" value="{{ $users->name }}" placeholder="Full name"
                        class="form-control" required />
                </div>
            </div>

            <div class="row mt-3">
                <label for="" class="col-md-4">Email <span
                        class="text-danger">*</span></label>
                <div class="col-md-8">
                    <input type="email" name="email" value="{{ $users->email }}" placeholder="Email"
                        class="form-control" required />
                </div>
            </div>

            <div class="row mt-3">
                <label for="" class="col-md-4">Phone Number </label>
                <div class="col-md-8">
                    <input type="text" name="phone" value="{{ $users->phone }}" placeholder="Phone number"
                        class="form-control" />
                </div>
            </div>

            <div class="row mt-3">
                <label for="" class="col-md-4">Address </label>
                <div class="col-md-8">
                    <input type="text" name="address" value="{{ $users->address }}" placeholder="Address"
                        class="form-control" />
                </div>
            </div>

            <div class="row mt-3">
                <label for="" class="col-md-4">Photo </label>
                <div class="col-md-8">
                    <input type="file" name="photo" value="{{ $users->photo }}"
                        class="form-control" accept="image/*" />
                    <img src="{{ asset($users->photo) }}" alt="" style="height: 80px"
                        class="mt-1">
                </div>
            </div>

            <div class="row mt-3">
                <label for="" class="col-md-4"></label>
                <div class="col-md-4 ">
                    <input type="submit" value="Update" class="btn-travel btn-green">
                </div>
            </div>
        </form>
    </div>
</div>
			</div>

		</div>
	</div>
@endsection