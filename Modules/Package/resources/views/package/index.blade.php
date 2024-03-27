@extends('admin.layouts.master')
@section('title', 'Packages')
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
                        <div class="card-header">
                            <span class="h3">All packages</span>
                            <a href="{{ route('package.create') }}" class="btn btn-primary rounded-2 float-end">Add Package</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-sprite">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Expire Date</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $package->name }}</td>
                                        <td>{{ $package->price }}</td>
                                        <td>{{ $package->expire_date }}</td>
                                        <td>

                                            <img src="{{ asset(!empty(json_decode($package->image)) ? json_decode($package->image)[0] : 'assets/default-images/images.jpeg') }}" width="140" height="100" alt="package_image" />

                                        </td>
                                        <td><span class="{{ $package->status == 1 ? 'text-success' : 'text-danger' }}">{{ $package->status == 1 ? 'active' : 'inactive' }}</span></td>
                                        <td >
                                            <div class="d-flex">
                                                <a href="{{ route('package.edit', $package->id) }}" class="btn m-1 rounded-2 btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('package.show', $package->id) }}" class="btn m-1 rounded-2 btn-success btn-sm">Detail</a>

                                                <form action="{{ route('package.destroy', $package->id) }}" method="POST" class="deleteForm">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger rounded-2 m-1 btn-sm btnDelete">Delete</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
