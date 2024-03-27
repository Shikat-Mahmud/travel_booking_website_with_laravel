@extends('admin.layouts.master')
@section('title', 'Contact List')
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
                        <span class="h3">Contact List</span>
                        <a href="{{ route('create.contact') }}" class="btn btn-primary rounded-2">Create Contact </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="example" style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Sl.</th>
                                        <th>country</th>
                                        <th>address</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    @foreach ($indexData as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->location}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td class="d-flex justify-content-end">
                                            <a href="{{ route('edit.contact', $item->id) }}" class="btn btn-primary btn-sm mr-2">Edit</a>
                                            <form class="deleteForm" action="{{ route('delete.contact', $item->id) }}" method="POST">
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
