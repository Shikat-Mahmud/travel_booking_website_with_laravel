@extends('admin.layouts.master')
@section('title', 'Slider edit')
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
                            <span class="h3">Slider edit</span>
                            <a href="{{ route('slider.index') }}" class="btn btn-warning rounded-2 float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        value="{{ $slider->title }}"
                                        placeholder="Slider title"
                                    />
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="editor" rows="5">{{ $slider->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image</label>
                                    <input
                                        type="file"
                                        class="form-control-file"
                                        name="image"
                                    /><br>
                                    <img src="{{ asset($slider->image) }}" height="250" width="350" class="mt-1" alt="slider_image" />
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary rounded-2" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
