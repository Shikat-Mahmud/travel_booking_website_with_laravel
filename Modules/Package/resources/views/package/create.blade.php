@extends('admin.layouts.master')
@section('title', 'Package create')
@push('styles')
<style>
.desc-box {
    max-width: 250px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.select2-container .select2-selection--single {
    height: 37px !important;
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
                        <span class="h3">Package create</span>
                        <a href="{{ route('package.index') }}" class="btn btn-warning rounded float-end">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data"
                            id="packageForm">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Package name"
                                    value="{{ old('name') }}" />
                            </div>

                            <div class="mb-3">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="price" placeholder="Package price"
                                    value="{{ old('price') }}" />
                            </div>

                            <div class="mb-3">
                                <label for="location">Location <span class="text-danger">*</span></label>

                                <input type="text" class="form-control" name="location" placeholder="Location"
                                    value="{{ old('location') }}" />

                            </div>

                            <div class="mb-3">
                                <label for="map_lat">Map Latitude </label>
                                <input type="text" value="{{ old('map_lat') }}" placeholder="Map Latitude"
                                    class="form-control" name="map_lat" />
                            </div>

                            <div class="mb-3">
                                <label for="map_long">Map Longitude </label>
                                <input type="text" value="{{ old('map_long') }}" placeholder="Map Longitude"
                                    class="form-control" name="map_long" />
                            </div>

                            <div class="mb-3">
                                <label for="duration">Duration <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('duration') }}" placeholder="Duration"
                                    class="form-control" name="duration" />
                            </div>

                            <div class="mb-3">
                                <label for="person">Person <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('person') }}" class="form-control" placeholder="Person"
                                    name="person" />
                            </div>
                            <div class="mb-3">
                                <label for="expire_date">Expire date <span class="text-danger">*</span></label>
                                <input type="date" value="{{ old('expire_date') }}" class="form-control"
                                    name="expire_date" />
                            </div>

                            <div class="mb-3">
                                <label for="includes">What Includes Separate multiple by ,(comma) or enter key </label>
                                <input type="text" value="{{ old('includes') }}"
                                    placeholder="Write your favorite includes" class="form-control" name="includes" />
                            </div>

                            <div class="mb-3">
                                <label for="excludes">What Excludes Separate multiple by ,(comma) or enter key </label>
                                <input type="text" value="{{ old('excludes') }}"
                                    placeholder="Write your favorite excludes" class="form-control" name="excludes" />
                            </div>

                            <div class="mb-3">
                                <label for="description">Description <sub class="opacity-50">(optional)</sub></label>
                                <textarea name="description" placeholder="Description" id="editor" class="form-control"
                                    rows="5">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="mb-2">Image <sub class="opacity-50">(optional)</sub></label>
                                <div class="col-md-9">
                                    <input type="file" {{ old('image[]') }} class="form-control-file" name="image[]"
                                        multiple />
                                </div>
                            </div>
                            <div class="mb-3">
                                <h5 class="mb-3">Features <span class="text-danger">*</span></h5>
                                <select name="features[]" class="form-control select2" multiple title="select features">
                                    @foreach($features as $feature)
                                    <option value="{{ $feature->id }}"
                                        {{ old('features[]') == $feature->id ? 'selected' : '' }}>{{ $feature->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="feature" class="col-md-3 mb-2">Is feature</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        {{ old('is_feature') == 1 ? 'checked' : '' }} name="is_feature" checked
                                        value="1" />
                                    <label class="form-check-label">
                                        General
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        {{ old('is_feature') == 2 ? 'checked' : '' }} name="is_feature" value="2" />
                                    <label class="form-check-label">
                                        feature
                                    </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="feature" class="col-md-3 mb-2">Package Type </label>
                                <select name="package_type" class="form-control">
                                    <option value="1" {{ old('category_id') == 1 ? 'selected' : '' }}>Single</option>
                                    <option value="2" {{ old('category_id') == 2 ? 'selected' : '' }}>Couple</option>
                                    <option value="3" {{ old('category_id') == 3 ? 'selected' : '' }}>Family</option>
                                    <option value="4" {{ old('category_id') == 5 ? 'selected' : '' }}>Friends</option>
                                </select>
                            </div>

                            <div class="">
                                <span class="h4">Tour plan</span>
                                <button class="btn btn-primary float-end" type="button" id="addInput">Add Tour
                                    plan</button>
                                <div id="dynamic_field" class="mt-5">

                                </div>
                            </div>

                            <div class="mt-3 row">
                                <button class="btn btn-primary" type="submit">Create</button>
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
    var counter = 0;
    $('#addInput').click(function() {
        counter++;
        var html = `
           <div class="row mb-3 d-flex" id="row${counter}">
                   <div class="col-md-5 float-start">
                       <label for="destination" class="fs-5">Title ${counter}</label>
                        <input type="text" class="form-control" placeholder="Enter Title ${counter}" name="package_plan[${counter}][title]" />
                   </div>
                <div class="float-start col-md-5">
                    <label for="description${counter}" class="fs-5">Description ${counter}</label>
                    <textarea name="package_plan[${counter}][description]"  class="form-control" row="5" placeholder="Enter your tour description"></textarea>
                </div>
                <div class="float-start text-center pt-5 col-md-2" id="dismissBtn">
                    <button type="button" id="${counter}" class="btn btn-danger btn_remove">X</button>
                </div>
            </div>
           `;
        $('#dynamic_field').append(html);
    });

    $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id).remove();
           counter--;
      });
});
</script>
@endpush
