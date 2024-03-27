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
                        <span class="h3">Pages List</span>
                        <a href="{{ route('create.pages') }}" class="btn btn-primary rounded-2">Create Pages </a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="example" style="max-width:100%;">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($indexData as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->slug}}</td>
                                    <td>{{$item->order_by}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('edit.pages', $item->slug) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                        <a href="{{ route('show.pages', $item->slug) }}" class="btn btn-success btn-sm mr-2">Details</a>
                                        <form class="deleteForm" action="{{ route('delete.pages', $item->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm rounded-2 btnDelete">Delete</button>
                                        </form>
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
</section>
@endsection
