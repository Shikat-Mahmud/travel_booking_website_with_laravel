<body data-pc-header="header-1" data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true"
    data-pc-direction="ltr" data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>


    @include('admin.partials.side-nav')

    <header class="pc-header">
        <div class="m-header">
            <a href="{{ route('home.index') }}" class="b-brand text-primary">

                @php
                $settings = generalSettings()
                @endphp
                @if($settings->logo)
                <img src="{{ asset('storage/' . $settings->logo) }}" class="logo-lg" alt="Logo image"
                    style="max-height: 40px; width: auto; max-width: 100%;">
                @else
                <img src="https://codedthemes.com/demos/admin-templates/gradient-able/bootstrap/default/assets/images/logo-white.svg"
                    alt="logo image" class="logo-lg">
                @endif
            </a>
        </div>
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">

                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ph ph-list"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ph ph-list"></i>
                        </a>
                    </li>
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ph ph-magnifying-glass"></i>
                        </a>
                        <div class="dropdown-menu pc-h-dropdown drp-search">
                            <form class="px-3">
                                <div class="form-group mb-0 d-flex align-items-center">
                                    <input type="search" class="form-control border-0 shadow-none"
                                        placeholder="Search here. . .">
                                    <button class="btn btn-light-secondary btn-search">Search</button>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="ph ph-sun-dim"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <a href="#!" class="dropdown-item"
                                onclick="if (!window.__cfRLUnblockHandlers) return false; layout_change('dark')"
                                data-cf-modified-90f9e57eb6fda3c0ef534197->
                                <i class="ph ph-moon"></i>
                                <span>Dark</span>
                            </a>
                            <a href="#!" class="dropdown-item"
                                onclick="if (!window.__cfRLUnblockHandlers) return false; layout_change('light')"
                                data-cf-modified-90f9e57eb6fda3c0ef534197->
                                <i class="ph ph-sun-dim"></i>
                                <span>Light</span>
                            </a>
                            <a href="#!" class="dropdown-item"
                                onclick="if (!window.__cfRLUnblockHandlers) return false; layout_change_default()"
                                data-cf-modified-90f9e57eb6fda3c0ef534197->
                                <i class="ph ph-cpu"></i>
                                <span>Default</span>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                            @auth
                                @if(Auth::user()->photo)
                                    <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                        style="height: 40px; width:40px; object-fit: cover; border-radius: 50%;"
                                        alt="user-image">
                                @else
                                    <img src="{{ asset('/images/user/avatar-1.jpg') }}"
                                        style="height: 40px; width:40px; object-fit: cover; border-radius: 50%;"
                                        alt="user-image">
                                @endif
                            @endauth
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h4 class="m-0">Profile</h4>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 225px)">
                                    <ul class="list-group list-group-flush w-100">
                                        <li class="list-group-item">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">

                                                @auth
                                                    @if(Auth::user()->photo)
                                                        <img src="{{ asset('storage/' . Auth::user()->photo) }}"
                                                            style="height: 40px; width:40px; object-fit: cover; border-radius: 50%;"
                                                            alt="user-image">
                                                    @else
                                                        <img src="{{ asset('/images/user/avatar-1.jpg') }}"
                                                            style="height: 40px; width:40px; object-fit: cover; border-radius: 50%;"
                                                            alt="user-image">
                                                    @endif
                                                @endauth
                                                </div>
                                                <div class="flex-grow-1 mx-3">
                                                    @auth
                                                    <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                                    <span class="link-primary">{{ auth()->user()->email }}</span>
                                                    @endauth
                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                                <span class="d-flex align-items-center">
                                                    <i class="ph ph-user-circle"></i>
                                                    <span>Edit profile</span>
                                                </span>
                                            </a>

                                            <a href="{{ route('general.setting') }}" class="dropdown-item">
                                                <span class="d-flex align-items-center">
                                                    <i class="ph ph-gear-six"></i>
                                                    <span>Settings</span>
                                                </span>
                                            </a>

                                            <form method="POST" action="{{ route('admin-logout') }}">
                                                @csrf
                                                <a href="#" class="dropdown-item" :href="route('admin-logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                                    <span class="d-flex align-items-center">
                                                        <i class="ph ph-power"></i>
                                                        <span>Logout</span>
                                                    </span>
                                                </a>
                                            </form>

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
