<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand" style="font-size: 15px;">
            Arogya Hela<span> Uyaana</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">

            <li class="nav-item nav-category">Medical Center</li>
            

            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.doctors.specializations.index') }}" class="nav-link" style="color: black">
                        Specialization
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.doctors.index') }}" class="nav-link" style="color: black">
                        Doctors
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.time_slots.index') }}" class="nav-link" style="color: black">
                        Time Slots
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.time_slots.doctor') }}" class="nav-link" style="color: black">
                        Doctor Time Slots
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.bookings.doctor') }}" class="nav-link" style="color: black">
                        Doctor Bookings
                    </a>
                </li>
            </ul>

            <li class="nav-item nav-category">Hotel</li>

            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.treatments.index') }}" class="nav-link" style="color: black">
                        Treatments
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.bookings.hotel') }}" class="nav-link" style="color: black">
                        Room Bookings
                    </a>
                </li>
            </ul>


            <li class="nav-item nav-category">Drugs Store</li>

            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.drugs.index') }}" class="nav-link" style="color: black">
                        Drugs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.drugs.prescriptions') }}" class="nav-link" style="color: black">
                        Prescriptions
                    </a>
                </li>
            </ul>

            <li class="nav-item nav-category">Feebacks</li>

            <ul class="nav sub-menu">
                <li class="nav-item">
                    <a href="{{ route('admin.feedbacks.index') }}" class="nav-link" style="color: black">
                        Customer's Feebacks
                    </a>
                </li>
            </ul>

        </ul>
    </div>
</nav>
