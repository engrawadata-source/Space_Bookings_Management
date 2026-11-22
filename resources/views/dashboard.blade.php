{{-- @extends('layouts.app')
@section('content')


<div class="container mt-5">

    <h2 class="mb-4">Dashboard Overview</h2>


    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Centers</h5>
                    <h2 class="text-primary">
                        {{ $statistics['centers_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Spaces</h5>
                    <h2 class="text-primary">
                        {{ $statistics['spaces_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Employees</h5>
                    <h2 class="text-primary">
                        {{ $statistics['employees_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <h2 class="text-primary">
                        {{ $statistics['customers_count'] }}
                    </h2>
                </div>
            </div>
        </div>

    </div>

    <!-- Booking Statistics -->
    <div class="card shadow-sm">

        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">Bookings by Status</h5>
        </div>

        <div class="card-body">

            <div class="row g-3 text-center">

                <div class="col-md-3">
                    <div class="card border-warning">
                        <div class="card-body">
                            <h6>Pending</h6>
                            <h2 class="text-warning">
                                {{ $statistics['pending_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-success">
                        <div class="card-body">
                            <h6>Confirmed</h6>
                            <h2 class="text-success">
                                {{ $statistics['confirmed_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <h6>Cancelled</h6>
                            <h2 class="text-secondary">
                                {{ $statistics['cancelled_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card border-danger">
                        <div class="card-body">
                            <h6>Rejected</h6>
                            <h2 class="text-danger">
                                {{ $statistics['rejected_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection --}}



@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4 text-success-emphasis fw-bold border-bottom border-success pb-3">
        Dashboard Overview
    </h2>

    <div class="row g-3 mb-4">

        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-success-subtle border-success-subtle rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-dark">Centers</h5>
                    <h2 class="text-success-emphasis fw-bold">
                        {{ $statistics['centers_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-success-subtle border-success-subtle rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-dark">Spaces</h5>
                    <h2 class="text-success-emphasis fw-bold">
                        {{ $statistics['spaces_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-success-subtle border-success-subtle rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-dark">Employees</h5>
                    <h2 class="text-success-emphasis fw-bold">
                        {{ $statistics['employees_count'] }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm text-center bg-success-subtle border-success-subtle rounded-3">
                <div class="card-body">
                    <h5 class="card-title text-dark">Customers</h5>
                    <h2 class="text-success-emphasis fw-bold">
                        {{ $statistics['customers_count'] }}
                    </h2>
                </div>
            </div>
        </div>

    </div>


    <!-- Booking Statistics -->
    <div class="card shadow-sm border-success rounded-3">

        <div class="card-header bg-success text-white py-3">
            <h5 class="mb-0 fw-bold">
                Bookings by Status
            </h5>
        </div>

        <div class="card-body bg-white">

            <div class="row g-3 text-center">

                <div class="col-md-3">
                    <div class="card bg-warning-subtle border-warning-subtle rounded-3">
                        <div class="card-body">
                            <h6 class="text-dark">Pending</h6>
                            <h2 class="text-warning-emphasis fw-bold">
                                {{ $statistics['pending_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-success-subtle border-success-subtle rounded-3">
                        <div class="card-body">
                            <h6 class="text-dark">Confirmed</h6>
                            <h2 class="text-success-emphasis fw-bold">
                                {{ $statistics['confirmed_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-secondary-subtle border-secondary-subtle rounded-3">
                        <div class="card-body">
                            <h6 class="text-dark">Cancelled</h6>
                            <h2 class="text-secondary-emphasis fw-bold">
                                {{ $statistics['cancelled_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-danger-subtle border-danger-subtle rounded-3">
                        <div class="card-body">
                            <h6 class="text-dark">Rejected</h6>
                            <h2 class="text-danger-emphasis fw-bold">
                                {{ $statistics['rejected_bookings'] }}
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
