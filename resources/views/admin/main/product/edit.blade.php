@extends('admin.layouts.master')
@section('title', 'Manage Product')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Edit Product</h4>

                            </div>
                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Product List</a>
                            </div>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Product Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" value="{{ $product->name }}"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4" required>Category Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" disabled selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Description</label>
                                    <div class="col-md-8">
                                        <textarea name="description" id="" class="form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4">Product Image</label>
                                    <div class="col-md-8">
                                        <input type="file" name="image" value="{{ $product->image }}"
                                            class="form-control" accept="image/*" />
                                        <img src="{{ asset($product->image) }}" alt="" style="height: 80px"
                                            class="mt-1">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4 ">Publication Status</label>
                                    <div class="col-md-8">
                                        <label for=""><input type="radio" name="status"
                                                {{ $product->status == 1 ? 'checked' : '' }} value="1" />
                                            Published</label>
                                        <label for=""><input type="radio" name="status"
                                                {{ $product->status == 0 ? 'checked' : '' }} value="0" />
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <input type="submit" value="update" class="btn btn-success">
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
