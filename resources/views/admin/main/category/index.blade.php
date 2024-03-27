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
                            <i class="fas fa-table me-1"></i>
                            Category List
                        </div>
                        @if (auth()->check() && auth()->user()->hasPermissionTo('create-category'))
                        <div>
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Create new
                                Category
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Icon</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <i class="fa {{ $item->icon }}"></i>
                                        </td>
                                        <td>
                                            @if ($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" alt="Product Image"
                                                style="height: 50px; border-radius: 6px;">
                                            @else
                                            <img src="https://placehold.co/400" alt="Default Image"
                                                style="height: 50px; border-radius: 6px;">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == '1')
                                            <span>Published</span> <i class="fas fa-circle text-c-green f-10 m-r-15"
                                                aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                            @elseif($item->status == '0')
                                            <span>Unpublished</span> <i class="fas fa-circle text-c-red f-10 m-r-15"
                                                aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if (auth()->check() && auth()->user()->hasPermissionTo('show-product'))
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="{{ route('admin.categories.show', $item->id) }}">View</a>
                                                @endif

                                                @if (auth()->check() &&
                                                auth()->user()->hasPermissionTo('edit-category'))
                                                <a class="btn btn-info btn-sm me-2"
                                                    href="{{ route('admin.categories.edit', $item->id) }}">Edit</a>
                                                @endif

                                                @if (auth()->check() &&
                                                auth()->user()->hasPermissionTo('delete-category'))
                                                <form class="deleteForm"
                                                    action="{{ route('admin.categories.destroy', $item->id) }}" method="post">
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