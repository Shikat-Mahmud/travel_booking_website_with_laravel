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
                        <span class="h3">Destination List</span>
                        <a href="{{ route('create.destination') }}" class="btn btn-primary rounded-2">Create Destination </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>Category</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Price</th>
                                        <th>image</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($indexData as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->city}}</td>
                                        <td>{{$item->price}}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="Image not found" style="height: 50px; border-radius: 6px;">
                                            @else
                                                <span>No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="{{ $item->status == 1 ? 'text-success' : 'text-danger' }}">{{ $item->status == 1 ? 'active' : 'inactive' }}</span>
                                        </td>
                                        <td class="d-flex justify-content-end">
                                            <a href="{{ route('edit.destination', $item->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                            <a href="{{ route('show.destination', $item->id) }}" class="btn btn-success btn-sm mr-2">Details</a>
                                            <form class="deleteForm" action="{{ route('delete.destination', $item->id) }}" method="POST">
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

    </div>
</section>
@endsection
