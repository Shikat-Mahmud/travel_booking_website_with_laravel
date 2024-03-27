@extends('admin.layouts.master')
@section('title', 'Add Product')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>Add Product</h4>
                        </div>
                        <div>
                            <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> Product List</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <label for="" class="col-md-4 required">Product Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ old('name') }}"/>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4 required">Category Name <span
                                        class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select name="category_id" id="" class="form-control">
                                        <option value="" disabled>Select a Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id')==$category->id ?
                                            'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <label for="" class="col-md-4">Description</label>
                                <div class="col-md-8">
                                    <textarea name="description" id="" class="form-control" cols="30"
                                        rows="10" placeholder="Description...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4">Product Image</label>
                                <div class="col-md-8">
                                    <input type="file" name="image" class="form-control" accept="image/*" />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <label for="" class="col-md-4 ">Publication Status</label>
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