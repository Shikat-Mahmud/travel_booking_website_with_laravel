
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <div class="card">
                <div class="card-header text-center">
                    <h4>Profile Information</h4>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                    @if (isset($user->photo))
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo" class="rounded-circle"
                            style="height: 100px; width: 100px; object-fit: cover; border: 3px solid #23B7E5; padding: 2px;">
                    @else
                        <img src="{{ asset('/assets/images/user/avatar-2.jpg') }}" class="img-radius mb-4"
                            alt="User-Profile-Image">
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <x-input-label for="name" : />
                                <x-text-input id="name" name="name" type="text" class="form-control"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3 form-group">
                                <x-input-label for="email" : />
                                <x-text-input id="email" name="email" type="email" class="form-control"
                                    :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification"
                                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <input type="file" name="photo"
                                    accept="image/png, image/jpg, image/gif, image/jpeg" class="form-control">
                            </div>
                        </div>
                        <br>

                        <div class="col-md-4 ">
                            <button class="btn btn-primary">{{ __('Save') }}</button>
                            @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
   
