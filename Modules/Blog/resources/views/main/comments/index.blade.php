@extends('admin.layouts.master')
@section('title', 'Manage comments')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            Comments Manage
                        </div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                    
                        <table class="table" id="example" style="max-width:100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ $comment->comment }}</td>
                                        <td>
                                            <form action="{{ route('comments.update', $comment->id) }}" method="POST" class="d-flex align-items-center">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group me-2 mb-0">
                                                    <select name="status" class="form-control">
                                                        <option value="pending" {{ $comment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="approved" {{ $comment->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-info btn-sm">Update</button>
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
