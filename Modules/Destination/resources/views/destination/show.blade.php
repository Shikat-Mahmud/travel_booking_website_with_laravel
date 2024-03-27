@extends('admin.layouts.master')
@section('title', 'About Us')
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
                        <div class="card-header d-flex justify-content-between align-items-center pb-5">
                            <span class="h3">Destination Details</span>
                            <a href="{{ route('index.destination') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->category->name }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Slug</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->name }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Priority</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->city }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Short Description</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->short_description }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Long Description</div>
                                <div class="col-lg-9 col-md-8">{!!$indexData->long_description!!}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Image</div>
                                <div class="col-lg-9 col-md-8">
                                    @if ($indexData->image)
                                        <img src="{{ asset('storage/' . $indexData->image) }}" alt="Image not found" style="height: 100px; border-radius: 6px;">
                                    @else
                                        <span>No image</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                <div class="col-lg-9 col-md-8">
                                    @if($indexData->status == 1) Active @else Inactive @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
