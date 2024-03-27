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
                            <span class="h3">Page Details</span>
                            <a href="{{ route('index.pages') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Title</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->title }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Slug</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->slug }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Priority</div>
                                <div class="col-lg-9 col-md-8">{{ $indexData->order_by }}</div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-lg-3 col-md-4 label ">Description</div>
                                <div class="col-lg-9 col-md-8">{!!$indexData->content!!}</div>
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
