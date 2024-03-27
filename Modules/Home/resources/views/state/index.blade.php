@extends('admin.layouts.master')
@section('title', 'Stats List')
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
                            Stats List
                        </div>
                        @if (auth()->check() && auth()->user()->hasPermissionTo('create-state'))
                        <div>
                            <a href="{{ route('state.create') }}" class="btn btn-primary btn-sm">Create new stats </a>
                        </div>
                        @endif
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="example"  style="max-width:100%;">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Value</th>
                                        <th>Icon</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($states as $state)
                                    <tr>
                                        <td>{{ $state->title }}</td>
                                        <td>{{ $state->value }}</td>
                                        
                                        <td>
                                            <i class="fa {{ $state->icon }}"></i>
                                        </td>
                                        <td>
                                            <div class="state-color" style="background-color: {{ $state->color }}; height: 20px; width: 30px; border-radius: 4px;"></div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                @if (auth()->check() && auth()->user()->hasPermissionTo('show-state'))
                                                <a class="btn btn-secondary btn-sm me-2"
                                                    href="{{ route('state.show', $state->id) }}">View</a>
                                                @endif

                                                @if (auth()->check() && auth()->user()->hasPermissionTo('edit-state'))
                                                <a class="btn btn-info btn-sm me-2"
                                                    href="{{ route('state.edit', $state->id) }}">Edit</a>
                                                @endif

                                                @if (auth()->check() &&
                                                auth()->user()->hasPermissionTo('delete-state'))
                                                <form class="deleteForm"
                                                    action="{{ route('state.destroy', $state->id) }}"
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