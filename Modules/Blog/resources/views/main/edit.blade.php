@extends('admin.layouts.master')

@section('title', 'Edit Blog')
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
                                <h4>Edit Blog</h4>
                            </div>
                            <div>
                                <a href="{{ route('blog.index') }}" class="btn btn-primary btn-sm"><i
                                        class="fas fa-arrow-left mr-2 "></i> Blog List</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="title" class="form-label" required>Title<span
                                        class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label" required>Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                {{-- <div class="mb-3">
                                    <label for="category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="category" name="category" value="{{ $blog->category }}">
                                </div> --}}

                                <div class="row mt-3">
                                    <label for="" class="col-md-4" required>Category Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-12">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tag" class="form-label">Tags</label>
                                    <input type="text" class="form-control" id="tag" name="tag_id" value="{{$blog->tag_id}}">
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="active" {{ $blog->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $blog->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ $blog->short_description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="long_description" class="form-label">Long Description</label>
                                    <textarea name="long_description" id="editor" class="form-control" cols="30" rows="10" placeholder=""  >{{ $blog->long_description }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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