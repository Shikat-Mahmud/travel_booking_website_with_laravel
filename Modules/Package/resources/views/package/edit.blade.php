@extends('admin.layouts.master')
@section('title', 'Package edit')
@push('styles')
    <style>
        .desc-box {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .select2-container .select2-selection--single {
            height: 37px!important;
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
                            <span class="h3">Package edit</span>
                            <a href="{{ route('package.index') }}" class="btn btn-warning rounded float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('package.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name">Category <span class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option {{ $package->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value={{ $package->name }} name="name" placeholder="Package name"  />
                                </div>

                                <div class="mb-3">
                                    <label for="price">Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control"  name="price" placeholder="Package price" value="{{ $package->price }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="location">Location <span class="text-danger">*</span></label>
                                    <input type="text" value="{{ $package->location }}" class="form-control" name="location" />
                                </div>

                                <div class="mb-3">
                                    <label for="map_lat">Map Latitude  </label>
                                    <input type="text" class="form-control" value="{{ $package->map_lat }}" name="map_lat" />
                                </div>

                                <div class="mb-3">
                                    <label for="map_long">Map Longitude </label>
                                    <input type="text" class="form-control" value="{{ $package->map_long }}"  name="map_long" />
                                </div>

                                <div class="mb-3">
                                    <label for="duration">Duration <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $package->duration }}"   name="duration" />
                                </div>

                                <div class="mb-3">
                                    <label for="person">Person <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" value="{{ $package->person }}" name="person" />
                                </div>
                                <div class="mb-3">
                                    <label for="expire_date">Expire date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" value="{{ $package->expire_date }}"  name="expire_date" />
                                </div>

                                <div class="mb-3">
                                    <label for="includes">What Includes Separate multiple by ,(comma) or enter key </label>
                                    <input type="text" class="form-control" value="{{ $package->includes }}" name="includes" />
                                </div>

                                <div class="mb-3">
                                    <label for="excludes">What Excludes Separate multiple by (comma), or enter key </label>
                                    <input type="text" class="form-control" value="{{ $package->excludes }}" name="excludes" />
                                </div>

                                <div class="mb-3">
                                    <label for="description">Description <sub class="opacity-50">(optional)</sub></label>
                                    <textarea name="description" placeholder="Description" id="editor" class="form-control"
                                              rows="5">{{ $package->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="mb-2">Image <sub class="opacity-50">(optional)</sub></label>
                                    <div class="col-md-9 mb-2">
                                        <input type="file" class="form-control-file" multiple name="image[]" />
                                    </div>
                                    @foreach(json_decode($package->image) as $image)
                                        <img src="{{ asset($image) }}" height="80" alt="package_image" />
                                    @endforeach
                                </div>


                                <div class="mb-3">
                                    <h5 class="mb-3">Features <span class="text-danger">*</span></h5>
                                    <select name="features[]" class="form-control select2" multiple>
                                        @foreach($features as $feature)
                                            <option @foreach(json_decode($package->features) as $id)
                                                        {{ $feature->id == $id ? 'selected' : '' }}
                                            @endforeach value="{{ $feature->id }}">{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="mb-3">
                                    <label for="feature" class="col-md-3 mb-2">Is feature</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" {{ $package->is_feature == 1 ? 'checked' : '' }} name="is_feature" checked value="1" />
                                        <label class="form-check-label">
                                            General
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" {{ $package->is_feature == 2 ? 'checked' : '' }} name="is_feature" value="2" />
                                        <label class="form-check-label">
                                            feature
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="feature" class="col-md-3 mb-2">Package Type </label>
                                    <select name="package_type" class="form-control">
                                        <option {{ $package->package_type == 1 ? 'selected' : '' }} value="1">Single</option>
                                        <option {{ $package->package_type == 2 ? 'selected' : '' }} value="2">Couple</option>
                                        <option {{ $package->package_type == 3 ? 'selected' : '' }} value="3">Family</option>
                                        <option  {{ $package->package_type == 4 ? 'selected' : '' }}value="4">Friends</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="feature" class="col-md-3 mb-2">Status </label>
                                    <select name="package_type" class="form-control">
                                        <option {{ $package->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $package->status == 1 ? 'selected' : '' }} value="1">inactive</option>
                                    </select>
                                </div>

                                <div class="">
                                    <span class="h4">Tour plan</span>
                                    <button class="btn btn-primary float-end" type="button" id="addInput">Add Tour
                                        plan</button>
                                    <div id="dynamic_field" class="mt-5">

                                        @php($plans = json_decode($package->tour_plan))
                                        @if(!empty($plans))
                                            @php($count = 0)
                                            @foreach($plans as $plan)
                                            @php($count++)
                                        <div class="row mb-3 d-flex" id="row{{ $count }}">
                                            <div class="col-md-5 float-start">
                                                <label for="destination" class="fs-5">Title {{ $count }}</label>
                                                <input type="text" class="form-control" placeholder="Enter Title {{ $count }}" value="{{ !empty($plan->title) ? $plan->title : '' }}" name="package_plan[{{ $count }}][title]" />
                                            </div>
                                            <div class="float-start col-md-5">
                                                <label for="description${counter}" class="fs-5">Description {{ $count }}</label>
                                                <textarea name="package_plan[{{$count}}][description]"  class="form-control" row="5" placeholder="Enter your tour description">{{ !empty($plan->description) ? $plan->description : '' }}</textarea>
                                            </div>
                                            <div class="float-start text-center pt-5 col-md-2" id="dismissBtn">
                                                <button type="button" id="{{$count}}" class="btn btn-danger btn_remove">X</button>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif

                                    </div>
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

            var counter = {{ $count }};
            if(counter < 0)
            {
                counter = 0
            }

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


