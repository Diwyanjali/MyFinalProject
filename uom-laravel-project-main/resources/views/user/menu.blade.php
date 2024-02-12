<ul class="nav flex-column nav-underline">
    <li class="nav-item">
        <a class="nav-link  @if (Route::currentRouteName() == 'user.dashboard') active @endif" href="{{ route('user.dashboard') }}">My
            Profile</a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'user.bookings.hotel') active @endif"
            href="{{ route('user.bookings.hotel') }}">Hotel Bookings</a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'user.bookings.medical') active @endif"
            href="{{ route('user.bookings.medical') }}">Medical Bookings</a>
    </li>

    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'user.reviews') active @endif"
            href="{{ route('user.reviews') }}">Reviews</a>
    </li>
</ul>
