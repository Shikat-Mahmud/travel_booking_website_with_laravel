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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span class="h3">Destination Create</span>
                            <a href="{{ route('index.destination') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.destination') }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf

                                <div class="mb-3">
                                    <label for="category_id">Category<span class="text-danger">*</span></label>
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name">Name<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        id="name"
                                        placeholder="Destination Name"
                                        value="{{old('name')}}" required
                                    />
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="mb-3">
                                    <label for="city">City<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="city"
                                        id="city"
                                        placeholder="City Name"
                                        value="{{old('city')}}" required
                                    />
                                    @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="price"
                                        id="price"
                                        placeholder="Destination price"
                                        value="{{old('price')}}" required
                                    />
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="short_description">Short Description<span class="text-danger">*</span></label>
                                    <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="5" placeholder="Short Description" required>{{old('short_description')}}</textarea>
                                    @error('short_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="editor">Logn Description<span class="text-danger">*</span></label>
                                    <textarea name="long_description" id="editor" class="form-control" cols="30" rows="10" required>{{old('long_description')}}</textarea>
                                    @error('long_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 w-25">
                                    <label for="image">Image<span class="text-danger">*</span></label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="image"
                                        id="image"
                                        placeholder="Destination image"
                                        value="{{old('image')}}" required
                                    />
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
