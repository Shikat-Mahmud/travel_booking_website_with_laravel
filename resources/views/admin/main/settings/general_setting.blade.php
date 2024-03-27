@extends('admin.layouts.master')
@section('title', 'General Setting')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <img style=" height: 50px; margin: 15px;"
                                        src="https://cdn-icons-png.flaticon.com/512/563/563541.png" alt="General Settings">
                                    <h5 class="mb-4"><b>General Settings</b></h5>
                                    <p class="mt-1 text-sm text-gray-600">
                                        Update your general settings of your website.
                                    </p>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Business Name: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Enter Title" class="form-control"
                                            name="business_name" required="" value="{{ $general->business_name ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Business Address: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="address" placeholder="Enter Address" class="form-control"
                                            name="business_address" required=""
                                            value="{{ $general->business_address ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Business Phone
                                        Number: <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="tel" placeholder="Enter Number" class="form-control"
                                            name="business_number" required=""
                                            value="{{ $general->business_number ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Business Whatsapp
                                        Number: <span class="text-danger">*</span> </label>
                                    <div class="col-sm-12">
                                        <input type="tel" placeholder="Enter Number" class="form-control"
                                            name="business_whatsapp" required=""
                                            value="{{ $general->business_whatsapp ?? '' }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-12 col-form-label">Business Email: <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <input type="email" placeholder="Enter email" class="form-control"
                                            name="business_email" required=""
                                            value="{{ $general->business_email ?? '' }}">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> Google Map API Key: </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="map_api_key" value="{{ $general->map_api_key}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> Logo: </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="logo"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->logo))
                                                    <img src="{{ asset('storage/' . $general->logo) }}" alt="Logo"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <p>There is no Logo. You can upload new one.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> FavIcon: </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="favicon"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->favicon))
                                                    <img src="{{ asset('storage/' . $general->favicon) }}" alt="FabIcon"
                                                        style="height: 50px; border-radius: 6px;">
                                                @else
                                                    <p>There is no Favicon. You can upload new one.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-5 mt-3">
                                    <label class="col-sm-4 col-form-label"> Banner Image: </label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="input-group">
                                                    <input type="file" name="banner_image"
                                                        accept="image/png, image/jpg, image/gif, image/jpeg"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                @if (isset($general->banner_image))
                                                    <img src="{{ asset('storage/' . $general->banner_image) }}"
                                                        alt="Banner Image" style="height: 80px; border-radius: 6px;">
                                                @else
                                                    <p>There is no banner image. You can upload new one.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="flex items-center gap-4">
                                        <a class="btn btn-danger" href="{{ route('admin.index') }}">Cancel</a>
                                        <button class="btn btn-info" type="submit">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    
                    
                </div>
            </form>
        </div>
    </section>
@endsection
