@extends('admin.layouts.master')
@section('title', 'Add Category')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Add Category</h4>
                            </div>
                            <div>
                                <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Category List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.categories.store') }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-3">
                                    <label for="" class="col-md-4" required>Category Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" placeholder="Category Name" value="{{ old('name') }}"/>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="icon" class="col-md-4">Icon <span class="text-danger">*</span></label>
                                    <div class="col-md-8 d-flex">
                                        <button class="btn btn-primary" data-icon="fas fa-map-marker-alt" role="iconpicker" data-rows="3" data-cols="10" data-arrow-class="btn-success" data-unselected-class="btn-primary"
                                            id="iconPickerButton">
                                        </button>
                                        <input type="text" name="icon" id="icon" class="form-control iconPosition" placeholder="Selected Icon" value="{{ old('icon') }}" required/>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Category Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" class="form-control" accept="image/*" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4 " required>Publication Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status" checked value="1" />
                                            Published</label>
                                        <label for=""><input type="radio" name="status" value="0" />
                                            Unpublished</label>
                                    </div>
                                </div>
                                
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <input type="submit" value="create" class="btn btn-success">
                                    </div>
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