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
                            <span class="h3">Destination Edit</span>
                            <a href="{{ route('index.destination') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.destination', $indexData->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="category_id">Category<span class="text-danger">*</span></label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $indexData->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                        value="{{$indexData->name}}" required
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
                                        value="{{$indexData->city}}" required
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
                                        value="{{$indexData->price}}" required
                                    />
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="short_description">Short Description<span class="text-danger">*</span></label>
                                    <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="5" placeholder="Short Description" required>{{$indexData->short_description}}</textarea>
                                    @error('short_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="editor">Logn Description<span class="text-danger">*</span></label>
                                    <textarea name="long_description" id="editor" class="form-control" cols="30" rows="20" required>{{$indexData->long_description}}</textarea>
                                    @error('long_description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 w-25">
                                    <label for="image">Image</label>
                                    <input
                                        type="file"
                                        class="form-control"
                                        name="image"
                                        id="image"
                                        placeholder="Destination image"
                                        value="{{$indexData->image}}"
                                    />
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status<span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option value="1" {{ $indexData->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="2" {{ $indexData->status == 2 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>                                
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
