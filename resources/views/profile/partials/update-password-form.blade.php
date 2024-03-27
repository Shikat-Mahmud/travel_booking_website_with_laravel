
        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header text-center">
                    <h4 class="mb-4">Update Password</h4>
                    <p class="mt-1 text-sm text-gray-600">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <x-input-label for="update_password_current_password" : />
                                <x-text-input id="update_password_current_password" name="current_password"
                                    type="password" class="form-control" autocomplete="current-password"
                                    placeholder="Current Password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <x-input-label for="update_password_password" : />
                                <x-text-input id="update_password_password" name="password" type="password"
                                    class="form-control" autocomplete="new-password" placeholder="New Password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <x-input-label for="update_password_password_confirmation" : />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                    type="password" class="form-control" autocomplete="new-password"
                                    placeholder="Confirm Password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>
                        </div>

                        <div class="col-md-4 ">
                            <button class="btn btn-primary">{{ __('Change Password') }}</button>

                            @if (session('status') === 'password-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
 
