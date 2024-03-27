@extends('admin.layouts.master')

@section('title', 'Create Blog')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
@endpush
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Add Blog</h4>
                            </div>
                            <div>
                                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> Blog List</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label><span class="text-danger">*</span>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label" required>Image<span
                                            class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                                <div class="row mt-3">
                                    <label for="category_id" class="col-md-4 required">Category Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="tag" class="form-label">Tag</label>
                                    <input type="text" class="form-control" id="tag" name="tag_id">
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="short_description" name="short_description" placeholder="Enter short description"
                                        rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="long_description" class="form-label">Long Description</label>
                                    <textarea name="long_description" id="editor" class="form-control" placeholder="Enter long description"
                                        cols="30" rows="10"></textarea>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Include Bootstrap Tags Input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <!-- Initialize Bootstrap Tags Input -->
    <script>
        $(document).ready(function() {
            $('#tag').tagsinput();
        });
    </script>
@endpush