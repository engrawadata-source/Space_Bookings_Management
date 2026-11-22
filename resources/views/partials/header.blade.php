
<header class="navbar bg-success shadow-sm px-4 py-3">

    <div class="container-fluid">

        <span class="navbar-brand text-white fw-bold mb-0">
            Center & Space Booking System
        </span>

        <div class="d-flex align-items-center gap-3">

            <div class="text-end">

                <div class="text-white fw-semibold">
                    {{ auth()->user()->name }}
                </div>

                <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle">

                    @if(auth()->user()->type === 'super_admin')
                        Super Admin
                    @elseif(auth()->user()->type === 'employee')
                        Employee
                    @endif

                </span>

            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="btn btn-outline-light rounded-pill px-3">
                    Logout
                </button>
            </form>

        </div>

    </div>

</header>
