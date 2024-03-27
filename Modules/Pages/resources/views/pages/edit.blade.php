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
                            <span class="h3">Edit Page</span>
                            <a href="{{ route('index.pages') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('update.pages', $indexData->slug) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        id="title"
                                        placeholder="Page Name"
                                        value="{{$indexData->title}}" required
                                    />
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="slug">Slug<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="slug"
                                        id="slug"
                                        placeholder="Slug Name"
                                        value="{{ $indexData->title }}" required readonly
                                    />
                                    @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="mb-3">
                                    <label for="order_by">Priority<span class="text-danger">*</span></label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="order_by"
                                        placeholder="Priority Number"
                                        value="{{$indexData->order_by}}" required 
                                    />
                                    @error('order_by')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="order_by">Status<span class="text-danger">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="status">
                                        <option value="">Select Status</option>
                                        <option value="1" {{ $indexData->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="2" {{ $indexData->status == 2 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                


                                <div class="mb-3">
                                    <label for="content">Description<span class="text-danger">*</span></label>
                                    <textarea name="content" id="editor" class="form-control" cols="30" rows="10" required>{{$indexData->content}}</textarea>
                                    @error('content')
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
   
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('title').addEventListener('input', function() {
                const title = this.value.toLowerCase().trim()
                    .replace(/[^a-z0-9]+/g, '-')  
                    .replace(/^-+|-+$/g, ''); 
                document.getElementById('slug').value = title;
            });
        });
    </script>

@endsection
