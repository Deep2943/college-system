@auth
<div class="px-4 sm:px-6 py-3 h-16 top-bar">
    <div class="relative w-100 d-flex justify-content-end">
        <button type="button" class="flex items-center cursor-pointer" id="opennavdropdown" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
            <img class="w-8 h-8 rounded-full mr-2" src="{{ asset('images/profile/' . auth()->user()->profile_picture) }}" alt="Avatar">
            <p class="user-name">{{ auth()->user()->name }}</p>
            <span class="svg-icon svg-icon-muted"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"/>
                </svg>
            </span>
        </button>
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
            <div class="menu-item px-3">
                <a href="{{ route('profile') }}" class="menu-link px-3">Profile</a>
            </div>
            <div class="menu-item px-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="menu-link px-3 w-100">{{ __('Logout') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endauth
@if (Route::has('login'))@endif