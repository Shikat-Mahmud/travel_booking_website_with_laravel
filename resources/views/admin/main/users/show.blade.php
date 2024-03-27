@extends('admin.layouts.master')
@section('title', 'User Details')
@section('content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <h4>User Details</h4>

                        </div>
                        <div>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm"><i
                                    class="fas fa-arrow-left mr-2 "></i> User List</a>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <div class="p-2">
                            @if (isset($user->photo))
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" class="rounded-circle"
                                style="height: 100px; width: 100px; object-fit: cover; border: 3px solid #23B7E5; padding: 2px;">
                            @else
                            <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" class="img-radius mb-4"
                                alt="User-Profile-Image">
                            @endif
                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <span style="font-size: 18px;">Name: </span>
                            </div>
                            <div>
                                <span style="font-size: 18px; margin-left: 5px;" class="ml-3"><b>{{ $user->name
                                        }}</b></span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <span style="font-size: 18px;">Email: </span>
                            </div>
                            <div>
                                <span style="font-size: 18px; margin-left: 5px;" class="ml-3"><b>{{ $user->email
                                        }}</b></span>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center">
                            <div>
                                <span style="font-size: 18px;">Role: </span>
                            </div>
                            <div>
                                <span style="font-size: 18px; margin-left: 5px;" class="ml-3">
                                    @if ($user->roles->count() > 0)
                                    @foreach ($user->roles as $role)
                                    <b>{{ $role->name }}</b>
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                    @else
                                    <b>{{ $user->role }}</b>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection