@extends('admin.layouts.master')
@section('title', 'Sliders')
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
                            <span class="h3">All Sliders</span>
                            <a href="{{ route('slider.create') }}" class="btn btn-primary rounded-2">Create Slider </a>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-sprite">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($sliders as $slider)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ substr($slider->description, 0, 40) }}{{ strlen($slider->description) >= 40 ? '...' : '' }}</td>
                                            <td>
                                                <img src="{{ asset($slider->image) }}" height="80" alt="slider_image" />
                                            </td>
                                            <td>
                                               <div class="d-flex">
                                                   <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary btn-sm rounded-2 m-1">Edit</a>

                                                   <form class="deleteForm" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="button" class="btn btn-danger btn-sm rounded-2 mt-1 deleteBtn">Delete</button>
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
