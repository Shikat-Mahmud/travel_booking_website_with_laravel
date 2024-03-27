@extends('admin.layouts.master')
@section('title', 'User List')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            User List
                        </div>
                        <div>
                            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Create new User
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-striped" style="max-width:100%;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                @if($user && !$user->hasRole('super_admin'))
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if (!$user->hasRole('super_admin'))
                                        <div class="d-flex justify-content-end">
                                            @if (auth()->check() && auth()->user()->hasPermissionTo('show-user'))
                                            <a class="btn btn-secondary btn-sm me-2"
                                                href="{{ route('admin.users.show', $user->id) }}">View</a>
                                            @endif

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('set-userRole'))
                                            <a class="btn btn-info btn-sm me-2"
                                                href="{{ route('admin.users.roles.edit', $user->id) }}">Roles</a>
                                            @endif

                                            @if (auth()->check() && auth()->user()->hasPermissionTo('delete-user'))
                                            <form class="deleteForm"
                                                action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn btn-danger btn-sm btnDelete">Delete</button>
                                            </form>
                                            @endif
                                        </div>
                                        @endif
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