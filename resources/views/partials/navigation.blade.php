
<nav class="py-4">

    <h5 class="text-success-emphasis fw-bold mb-4 px-3">
        Navigation
    </h5>

    <div class="d-flex flex-column gap-2">

        <a href="{{ route('dashboard') }}"
           class="btn text-start {{ request()->routeIs('dashboard') ? 'btn-success' : 'btn-outline-success' }}">
            Dashboard
        </a>

        @if(auth()->user()->type === 'super_admin')

            <a href="{{ route('employees.index') }}"
               class="btn text-start {{ request()->routeIs('employees.*') ? 'btn-success' : 'btn-outline-success' }}">
                Employees
            </a>

        @endif

        <a href="{{ route('centers.index') }}"
           class="btn text-start {{ request()->routeIs('centers.*') ? 'btn-success' : 'btn-outline-success' }}">
            Centers
        </a>

        <a href="{{ route('spaces.index') }}"
           class="btn text-start {{ request()->routeIs('spaces.*', 'spaces.in.center') ? 'btn-success' : 'btn-outline-success' }}">
            Spaces
        </a>

        <a href="{{ route('bookings.index') }}"
           class="btn text-start {{ request()->routeIs('bookings.*') ? 'btn-success' : 'btn-outline-success' }}">
            Bookings
        </a>

    </div>

</nav>
