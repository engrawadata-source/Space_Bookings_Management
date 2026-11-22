
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}
        <div class="card-header bg-success text-white py-3">
            <h4 class="mb-0 fw-bold">
                Booking Details
            </h4>
        </div>


        {{-- Card Body --}}
        <div class="card-body p-4">

            <table class="table table-striped align-middle mb-0">

                <tbody>

                    <tr>
                        <th class="text-secondary">Booking ID</th>
                        <td>{{ $booking->id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Customer ID</th>
                        <td>{{ $booking->customer_id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Space ID</th>
                        <td>{{ $booking->space_id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Booking Date</th>
                        <td>{{ $booking->booking_date }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Start Time</th>
                        <td>{{ $booking->start_time }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">End Time</th>
                        <td>{{ $booking->end_time }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Number of People</th>
                        <td>{{ $booking->num_of_people }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Total Price</th>

                        <td class="text-success-emphasis fw-bold">
                            {{ $booking->total_price }}
                        </td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Status</th>

                        <td>

                            @if($booking->status == 'pending')

                                <span class="badge bg-warning-subtle text-warning-emphasis">
                                    Pending
                                </span>

                            @elseif($booking->status == 'confirmed')

                                <span class="badge bg-success-subtle text-success-emphasis">
                                    Confirmed
                                </span>

                            @elseif($booking->status == 'cancelled')

                                <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                    Cancelled
                                </span>

                            @elseif($booking->status == 'rejected')

                                <span class="badge bg-danger-subtle text-danger-emphasis">
                                    Rejected
                                </span>

                            @endif

                        </td>
                    </tr>

                </tbody>

            </table>

        </div>


        {{-- Card Footer --}}
        <div class="card-footer bg-secondary-subtle py-3">

            <div class="d-flex justify-content-end">

                <form action="{{ route('bookings.index') }}"
                      method="GET">

                    <x-button type="submit"
                              text="Back to Bookings"
                              color="secondary"
                              :outline="true" />

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
