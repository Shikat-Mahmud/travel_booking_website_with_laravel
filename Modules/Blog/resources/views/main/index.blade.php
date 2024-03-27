



@extends('admin.layouts.master')

@section('title', 'Blog List')

@push('styles')
    <style>
        .desc-box {
            max-width: 250px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
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
                                Blog List
                            </div>
                            {{-- @if (auth()->check() && auth()->user()->hasPermissionTo('create-state')) --}}
                            <div>
                                <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm">Create new Blog</a>
                            </div>
                            {{-- @endif --}}
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="example" style="max-width:100%;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Tags</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $blog->title }}</td>
                                                <td>

                                                    @if ($blog->image)
                                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                                            style="height: 50px; border-radius: 6px;">
                                                    @else
                                                    <img src="https://placehold.co/400" alt="Default Image"
                                                style="height: 50px; border-radius: 6px;">
                                                    @endif
                                                </td>

                                                <td>{{ $blog->category ? $blog->category->name : '' }}</td>

                                                <td>
                                            
                                                        {{ $blog->tag_id }},
                                            
                                                </td>
                                                
                                                <td>
                                                    @if ($blog->status == 'active')
                                                    <span>Active</span> <i class="fas fa-circle text-c-green f-10 m-r-15"
                                                        aria-hidden="true" style="color: green; mergin-left: 2px;"></i>
                                                    @elseif($blog->status == 'inactive')
                                                    <span>Inactive</span> <i class="fas fa-circle text-c-red f-10 m-r-15"
                                                        aria-hidden="true" style="color: red; mergin-left: 2px;"></i>
                                                    @endif    
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{-- @if (auth()->check() && auth()->user()->hasPermissionTo('show-state')) --}}
                                                            {{-- <a class="btn btn-secondary btn-sm me-2"
                                                                href="{{ route('blog.show', $blog->id) }}">View</a> --}}
                                                        {{-- @endif --}}

                                                        {{-- @if (auth()->check() && auth()->user()->hasPermissionTo('edit-state')) --}}
                                                            <a class="btn btn-info btn-sm me-2"
                                                                href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                                        {{-- @endif --}}

                                                        {{-- @if (auth()->check() && auth()->user()->hasPermissionTo('delete-blog')) --}}
                                                            <form class="deleteForm"
                                                                action="{{ route('blog.destroy', $blog->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-danger btn-sm btnDelete">Delete</button>
                                                            </form>
                                                        {{-- @endif --}}
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
