@extends('admin.layouts.master')
@section('title', 'Profile setting')
@section('content')
    <section class="pc-container">
        <div class="pc-content">
            @include('profile.partials.update-profile-information-form')
            @include('profile.partials.update-password-form')
            @if(Auth::user() && !Auth::user()->hasRole('super_admin'))
            @include('profile.partials.delete-user-form')
            @endif
            <br>
        </div>
    </section>
@endsection
