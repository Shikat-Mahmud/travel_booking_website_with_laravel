@extends('admin.layouts.master')
@section('title', 'Feature')
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
                            <span class="h3">All features</span>
                            <a href="{{ route('feature.create') }}" class="btn btn-primary float-end">Add feature</a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-sprite">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Icon</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($features as $feature)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feature->name }}</td>
                                        <td>
                                            <img src="{{ asset($feature->image) }}" height="80" width="120" alt="feature_img" />
                                        </td>
                                        <td>
                                            <i class="fa {{ $feature->icon }}"></i>
                                        </td>
                                        <td>
                                            <span class="{{ $feature->status == 1 ? 'text-success' : 'text-danger' }}">{{ $feature->status == 1 ? 'active' : 'inactive' }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('feature.edit', $feature->id) }}" class="btn btn-primary btn-sm m-1">Edit</a>
                                                <form class="deleteForm" action="{{ route('feature.destroy', $feature->id) }}" method="POST" >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  class="btn btn-danger btnDelete btn-sm rounded-2 mt-1" type="button">Delete</button>
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
