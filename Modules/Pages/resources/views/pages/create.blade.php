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
                            <span class="h3">Page Create</span>
                            <a href="{{ route('index.pages') }}" class="btn btn-warning float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.pages') }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label for="title">Title<span class="text-danger">*</span></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="title"
                                        id="title"
                                        placeholder="Page Name"
                                        value="{{old('title')}}" required
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
                                        value="{{old('slug')}}" required readonly
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
                                        value="{{old('order_by')}}" 
                                    />
                                    @error('order_by')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="content">Description<span class="text-danger">*</span></label>
                                    <textarea name="content" id="editor" class="form-control" cols="30" rows="10" required>{{old('content')}}</textarea>
                                    @error('content')
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

    <<script>
        // Generate slug based on title
        document.getElementById('title').addEventListener('input', function() {
            const title = this.value.toLowerCase().trim()
                .replace(/[^a-z0-9]+/g, '-')  // Replace non-alphanumeric characters with '-'
                .replace(/^-+|-+$/g, '');      // Remove leading/trailing dashes
            document.getElementById('slug').value = title;
        });
    </script>

@endsection
