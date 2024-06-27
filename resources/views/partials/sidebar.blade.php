<div class="sidebar offcanvas-sm offcanvas-start rounded-3 shadow d-flex flex-column flex-shrink-0 p-3 m-2" tabindex="-1"
    id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    {{-- BDoctors Logo --}}
    <a href="{{ url('/') }}" class="d-flex align-items-center link-body-emphasis text-decoration-none gap-3">
        <img width="60" src="/img/BDoctors_transparent.png" class="rounded-circle align-self-center">
        <span class="fs-4">BDoctors</span>
    </a>

    <hr>

    <ul class="nav nav-pills flex-column mb-auto gap-1">

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
            <i class="fa-solid fa-home"></i>
            <a href="{{ url('dashboard') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }} ">
                {{ __('Dashboard') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.doctorProfile.index' ? 'active' : '' }}">
            <i class="fa-solid fa-user-doctor"></i>
            <a href="{{ route('admin.doctorProfile.index') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.doctorProfile.index' ? 'active' : '' }} ">
                {{ __('Profile') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.messages.index' ? 'active' : '' }}">
            <i class="fa-solid fa-envelope-open-text"></i>
            <a href="{{ route('admin.messages.index') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.messages.index' ? 'active' : '' }} ">
                {{ __('Messages') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.reviews.index' ? 'active' : '' }}">
            <i class="fa-solid fa-user-check"></i>
            <a href="{{ route('admin.reviews.index') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.reviews.index' ? 'active' : '' }} ">
                {{ __('Reviews') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.vote.index' ? 'active' : '' }}">
            <i class="fa-solid fa-star"></i>
            <a href="{{ route('admin.vote.index') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.vote.index' ? 'active' : '' }} ">
                {{ __('Votes') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.sponsorship.index' ? 'active' : '' }}">
            <i class="fa-solid fa-ad"></i>
            <a href="{{ route('admin.sponsorship.index') }}"
                class="w-100 nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.sponsorship.index' ? 'active' : '' }} ">
                {{ __('Sponsorships') }}
            </a>
        </li>

        <li
            class="nav-item d-flex align-items-baseline ps-2 {{ Route::currentRouteName() === 'admin.statistics.index' ? 'active' : '' }}">
            <i class="fa-solid fa-chart-line"></i>
            <a href="{{ route('admin.statistics.index') }}"
                class="nav-link py-1 ps-2 {{ Route::currentRouteName() === 'admin.statistics.index' ? 'active' : '' }} ">
                {{ __('Statistics') }}
            </a>
        </li>

    </ul>

    <hr>

    <div class="dropdown">

        <a class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            @if ($doctorProfile->photo)
                <img class="profile_img img-fluid rounded-circle me-2" loading="lazy"
                    src="{{ asset('storage/' . $doctorProfile->photo) }}" alt="">
            @else
                <img class="profile_img img-fluid rounded-circle me-2" loading="lazy" src="/img/no-image.jpg"
                    alt="">
            @endif

            {{ Auth::user()->name . ' ' . $doctorProfile->surname }}
        </a>

        <ul class="dropdown-menu text-small shadow p-2">

            <li class="d-flex align-items-center">
                <a class="dropdown-item py-1 ps-2" href="{{ url('profile') }}">
                    <i class="fa-solid fa-user my_primary"></i>
                    {{ __('Account') }}
                </a>
            </li>

            <li class="d-flex align-items-center">
                <a class="dropdown-item py-1 ps-2" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket my_primary"></i>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </li>

        </ul>

    </div>

</div>
