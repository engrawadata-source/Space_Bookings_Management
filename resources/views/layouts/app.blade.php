
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Center & Space Booking System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 bg-body-tertiary">

    @php
        $showDashboardLayout =
            !request()->routeIs('login.form')
            && auth()->check()
            && in_array(auth()->user()->type, ['super_admin', 'employee']);
    @endphp


    @if($showDashboardLayout)

        @include('partials.header')

        <div class="container-fluid flex-grow-1 d-flex flex-column">

            <div class="row flex-grow-1">

                <aside class="col-md-3 col-lg-2 bg-secondary-subtle border-end">

                    @include('partials.navigation')

                </aside>

                <main class="col-md-9 col-lg-10 py-4 px-4 bg-body-tertiary">

                    <div class="container-fluid">

                        @yield('content')

                    </div>

                </main>

            </div>

        </div>

        @include('partials.footer')

    @else

        <main class="flex-grow-1 d-flex align-items-center justify-content-center py-4 px-3">

            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-12 col-sm-10 col-md-7 col-lg-5">

                        @yield('content')

                    </div>

                </div>

            </div>

        </main>

    @endif

</body>
</html>
