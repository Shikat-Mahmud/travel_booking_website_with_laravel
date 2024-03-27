@extends('admin.layouts.master')
@section('title', 'Subscriber List')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Subscriber List
                        </div>

                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="max-width:100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Subscriber Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $subscribe)
                                <tr>
                                    <td>{{ $subscribe->id }}</td>
                                    <td>{{ $subscribe->email }}</td>

                                    <td>
                                        <div class="d-flex">
                                            @if (auth()->check() && auth()->user()->hasPermissionTo('delete-subscribe'))
                                            <form class="deleteForm"
                                                action="{{ route('subscribe.destroy', $subscribe->id) }}" method="post">
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
</section>
@endsection