@extends('admin.layouts.master')
@section('title', 'Feature edit')
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
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header mb-4">
                            <span class="h3">Feature edit</span>
                            <a href="{{ route('feature.index') }}" class="btn btn-warning rounded float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('feature.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{ $feature->name }}"
                                        placeholder="Package name"
                                    />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description <sub class="opacity-50">(optional)</sub></label>
                                    <textarea name="description" placeholder="Description" class="form-control" rows="5">{{ $feature->description ?? '' }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="icon" class="col-md-4">Icon <span class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <button class="btn btn-primary" data-icon="fas fa-map-marker-alt" role="iconpicker" data-rows="3" data-cols="10" data-arrow-class="btn-success" data-unselected-class="btn-primary"
                                            id="iconPickerButton">
                                        </button>
                                        <input type="text" name="icon" id="icon" class="form-control" placeholder="Selected Icon" value="{{ $feature->icon }}" required/>
                                    </div>
                                </div>
                                <div class="mbl-3">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input
                                        type="file"
                                        class="form-control-file mb-2"
                                        name="image"
                                        value="{{ old('image') }}"
                                    /><br>
                                    <img src="{{ asset($feature->image) }}" height="250" width="350" alt="">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="my-3">
                                    <label for="status">Activity</label>
                                    <select name="status" class="form-select">
                                        <option value="0" {{ $feature->status == 0 ? 'selected' : '' }}>inactive</option>
                                        <option value="1" {{ $feature->status == 1 ? 'selected' : '' }}>active</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-icon', function() {
            var closestIcon = $(this).find('i').attr('class');
            $('#icon').val(closestIcon);
        });
    });
  </script>
@endpush