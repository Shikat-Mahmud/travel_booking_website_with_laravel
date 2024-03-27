@extends('admin.layouts.master')
@section('title', 'Role List')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Role List
                        </div>
                        @if (auth()->check() && auth()->user()->hasPermissionTo('create-role'))
                        <div>
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm">Create new Role
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="width:100%">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $item)
                                @if($item && $item->name !== 'super_admin')
                                <tr>
                                    <td>{{ $item->name }}</td>

                                    <td>
                                        <div class="d-flex justify-content-end">

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('edit-role'))
                                            <a class="btn btn-info btn-sm me-2"
                                                href="{{ route('admin.roles.edit', $item->id) }}">Edit</a>
                                            @endif

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('delete-role'))
                                            @if (auth()->user()->hasRole('super_admin'))
                                            <form class="deleteForm"
                                                action="{{ route('admin.roles.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btnDelete">Delete</button>
                                            </form>
                                            @elseif ($item->name !== 'admin')
                                            <form class="deleteForm"
                                                action="{{ route('admin.roles.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btnDelete">Delete</button>
                                            </form>
                                            @endif
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                                @endif
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