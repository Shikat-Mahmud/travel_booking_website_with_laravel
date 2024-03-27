@extends('admin.layouts.master')
@section('title', 'Slider create')
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
                            <span class="h3">Slider create</span>
                            <a href="{{ route('slider.index') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        value="{{ old('title') }}"
                                        placeholder="Slider title"
                                    />
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description<span class="text-danger">*</span></label>
                                    <textarea name="description" placeholder="Slider description" id="editor" class="form-control" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input
                                        type="file"
                                        class="form-control-file"
                                        value="{{ old('image') }}"
                                        name="image"
                                    />
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
