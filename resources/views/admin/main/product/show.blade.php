@extends('admin.layouts.master')
@section('title', 'Product Details')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <h4>Product Details</h4>

                            </div>
                            <div>
                                <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-left mr-2 "></i> Product List</a>
                            </div>
                        </div>
                        <div class="card-body text-dark">
                            <div class="p-2 text-center">
                                @if (isset($product->image))
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="Photo"
                                        style="height: 200px; border-radius: 10px;">
                                @else
                                    <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" alt="User-Profile-Image">
                                @endif
                            </div>
                            <br>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Product Name: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $product->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Category Name: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $product->category->name }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Description: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3">{{ $product->description }}</p>
                                </div>
                            </div>

                            <div class="row d-flex text-left">
                                <div class="col-md-4">
                                    <span>Product Status: </span>
                                </div>
                                <div class="col-md-8">
                                    <p class="ml-3"> <b>
                                            @if ($product->status == 1)
                                                Published <i class="fas fa-circle text-c-green f-10 m-r-15"
                                                    aria-hidden="true" style="color: green; margin-left: 2px;"></i>
                                            @else
                                                Unpublished <i class="fas fa-circle text-c-red f-10 m-r-15"
                                                    aria-hidden="true" style="color: red; margin-left: 2px;"></i>
                                            @endif
                                        </b></p>
                                </div>
                            </div>

                            <br>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
