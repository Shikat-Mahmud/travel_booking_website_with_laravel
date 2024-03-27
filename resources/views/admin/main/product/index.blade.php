@extends('admin.layouts.master')
@section('title', 'Product List')
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
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Product List
                        </div>
                        @if (auth()->check() && auth()->user()->hasPermissionTo('create-product'))
                        <div>
                            <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Create new Product </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Cat.Name</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category ? $product->category->name : '' }}</td>
                                        <td class="desc-box">{{ $product->description }}</td>
                                        <td>
                                            @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image"
                                                style="height: 50px; border-radius: 6px;">
                                            @else
                                            <img src="https://placehold.co/400" alt="Default Image"
                                                style="height: 50px; border-radius: 6px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == '1')
                                            <span>Published</span> <i class="fas fa-circle text-c-green f-10 m-r-15"
                                                aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                            @elseif($product->status == '0')
                                            <span>Unpublished</span> <i class="fas fa-circle text-c-red f-10 m-r-15"
                                                aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if (auth()->check() && auth()->user()->hasPermissionTo('show-product'))
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="{{ route('products.show', $product->id) }}">View</a>
                                                @endif

                                                @if (auth()->check() && auth()->user()->hasPermissionTo('edit-product'))
                                                <a class="btn btn-info btn-sm me-2"
                                                    href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                @endif

                                                @if (auth()->check() &&
                                                auth()->user()->hasPermissionTo('delete-product'))
                                                <form class="deleteForm"
                                                    action="{{ route('products.destroy', $product->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btnDelete">Delete</button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection