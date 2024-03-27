@extends('frontend.master')
@section('title', 'Reset Password')
@push('styles')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/user-dashboard.css')}}">
@endpush
@section('content')
    <div class="container">
        <div class="row pt-20">
			@include('user::user.partial.side-nav')
			
			<div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background: #fff; margin-bottom: 20px;">
                        <div>
                            <h4>Update Password</h4>
                        </div>
                        <div>
                            <a href="{{ route('user.index') }}" class="btn-travel btn-yellow"><i class="fas fa-arrow-left mr-2 "></i> Profile Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <section>
                        <header>
                            <p style="color: #808b8d;">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                        </header>
                        <br>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                                <div class="row mt-3">
                                    <label for="update_password_current_password" :value="__('Current Password')" class="col-md-4">Current Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input placeholder="Current Password" id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full form-control" autocomplete="current-password" required />
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="update_password_password" :value="__('New Password')" class="col-md-4">New Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input placeholder="New Password" id="update_password_password" name="password" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" required />
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="update_password_password_confirmation" :value="__('Confirm Password')" class="col-md-4">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input placeholder="Confirm Password" id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full form-control" autocomplete="new-password" required />
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                                <br>

                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-4 ">
                                        <button class="btn-travel btn-green">{{ __('Save') }}</button>
                                    </div>
                                </div>
                                <br>

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-green-600"
                                    >{{ __('✔ Password updated successfully.') }}</p>
                                @endif

                            </form>
                        </section>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection

@push('scripts')
    <script>
        @if(Session::has('success'))
            toastr.success('{{ Session::get('success') }}');
        @endif
    </script>
@endpush
