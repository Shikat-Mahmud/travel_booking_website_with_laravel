@push('styles')
<style>
    .profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #5b9bd1;
    text-decoration: none !important;
}
</style>
@endpush
<div class="col-md-4">
            <div class="portlet light profile-sidebar-portlet bordered">
                <div class="profile-userpic d-flex">
				@if(isset(auth()->user()->photo))
                <img src="{{ asset('storage/' . $users->photo) }}"  class="rounded-circle p-1" style="width: 150px; height: 150px; object-fit: cover;">
                @else
                <img src="{{ asset('images/id-photo2.jpg')}}"  class="rounded-circle p-1" style="width: 150px; height: 150px; object-fit: cover;">
                @endif
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name" style="color: #2C3E50 !important;"> {{ $users->name }} </div>
                    <span> {{ $users->email }} </span>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                            <a href="{{ route('user.index') }}">
                                <i class="fa fa-user"></i> Profile Details
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('change.password') ? 'active' : '' }}">
                            <a href="{{ route('change.password') }}">
                                <i class="fas fa-key"></i> Password Reset
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('user.booking') ? 'active' : '' }}">
                            <a href="{{ route('user.booking') }}">
                                <i class="fas fa-calendar-check"></i> Booking Details
                            </a>
                        </li> <br>

                        <li class="text-center">
                                <button href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn-travel rounded-2 btn-yellow">
                                    {{ __('Logout') }}
                                </button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>