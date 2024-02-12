<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light">
                <a href="{{ route('welcome') }}">
                    <span>
                        Arogya Hela Uyana
                    </span>
                </a>
            </h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a href="{{ route('welcome') }}" class="{{ Route::currentRouteName() == 'welcome' ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{ route('web.medical_center.index') }}"
                        class="{{ Route::currentRouteName() == 'web.medical_center.index' ? 'active' : '' }}">
                        Medical Center
                    </a>
                </li>

                <li>
                    <a href="{{ route('web.hotel.index') }}"
                        class="{{ Route::currentRouteName() == 'web.hotel.index' ? 'active' : '' }}">
                        Hotel
                    </a>
                </li>

                <li>
                    <a href="{{ route('feedbacks') }}" class="{{ Route::currentRouteName() == 'feedbacks' ? 'active' : '' }}">
                        Feedbacks
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                        About Us
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}">
                        Contact Us
                    </a>
                </li>


                @if (Route::has('login'))

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Hi {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    @if (Auth::user()->role == 'user')
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                            Profile
                                        </a>
                                    @elseif(Auth::user()->role == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            Admin Dashboard
                                        </a>
                                    @elseif(Auth::user()->role == 'doctor')
                                        <a class="dropdown-item" href="{{ route('doctor.dashboard') }}">
                                            Doctor Dashboard
                                        </a>
                                    @endif
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            Logout
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Login
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Register
                            </a>
                        @endif
                    @endauth

                @endif

            </ul>
            </li>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
