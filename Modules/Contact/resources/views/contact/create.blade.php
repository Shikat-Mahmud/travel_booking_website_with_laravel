@extends('admin.layouts.master')
@section('title', 'Contact Create')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
        }
    </style>
@endpush

@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="h3">Contact Create</span>
                            <a href="{{ route('index.contact') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.contact') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="location">Country<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="location"
                                        id="location"
                                        placeholder="Country Name"
                                        value="{{old('location')}}" required
                                    />
                                    @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="mb-3">
                                    <label for="address">Address<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="address"
                                        id="address"
                                        placeholder="Address Name"
                                        value="{{old('address')}}" required
                                    />
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        id="email"
                                        placeholder="Email Name"
                                        value="{{old('email')}}" required
                                    />
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone">Phone<span class="text-danger">*</span></label>
                                    <input
                                        type="phone"
                                        class="form-control"
                                        name="phone"
                                        id="phone"
                                        placeholder="Phone Number"
                                        value="{{old('phone')}}" required
                                    />
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
