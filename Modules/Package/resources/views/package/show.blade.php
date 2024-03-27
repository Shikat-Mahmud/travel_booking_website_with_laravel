@extends('admin.layouts.master')
@section('title', 'Package detail')
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
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="h3">Package detail</span>
                            <a href="{{ route('package.index') }}" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-sprite">
                                <tr>
                                    <th>Category Name</th>
                                    <td>{{ $package->name }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $package->name }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $package->price }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $package->location }}</td>
                                </tr>
                                <tr>
                                    <th>Map Latitude</th>
                                    <td>{{ $package->map_lat  }}</td>
                                </tr>
                                <tr>
                                    <th>Map Longitude </th>
                                    <td>{{ $package->map_long  }}</td>
                                </tr>
                                <tr>
                                    <th>Duration</th>
                                    <td>{{ $package->duration  }}</td>
                                </tr>
                                <tr>
                                    <th>Person</th>
                                    <td>{{ $package->person }} person</td>
                                </tr>
                                <tr>
                                    <th>Exprire date</th>
                                    <td>{{ $package->expire_date }} person</td>
                                </tr>
                                <tr>
                                    <th>Includes</th>
                                    <td>{{ $package->includes }}</td>
                                </tr>
                                <tr>
                                    <th>Excludes</th>
                                    <td>{{ $package->excludes  }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{!! $package->description  !!}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @foreach(json_decode($package->image) as $image)
                                             <img src="{{ asset($image) }}" height="120" alt="package_image" />
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <th>Is Feature</th>
                                    <td>{{ $package->is_feature == 1 ? 'general' : 'feature' }}</td>
                                </tr>
                                <tr>
                                    <th>Package type</th>
                                    <td><span class="">{{ $package->package_type == 0 ? 'General' : 'Featured' }}</span></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><span class="{{ $package->status == 1 ? 'text-success' : 'text-danger' }}">{{ $package->status == 1 ? 'active' : 'inactive' }}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
