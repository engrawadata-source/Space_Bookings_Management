
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    {{-- Page Title --}}

    <div class="d-flex justify-content-between align-items-center mb-4
                border-bottom border-success pb-3">

        <h3 class="text-success-emphasis fw-bold mb-0">
            Bookings Management
        </h3>

    </div>


    {{-- Booking Status Filters --}}

    <div class="d-flex flex-wrap gap-2 mb-4">

        <form action="{{ route('bookings.index') }}" method="GET">

            <x-button type="submit"
                      text="Show All"
                      color="primary"
                      :outline="false" />

        </form>


        <form action="{{ route('bookings.byStatus', 'pending') }}" method="GET">

            <x-button type="submit"
                      text="Pending"
                      color="warning"
                      :outline="false" />

        </form>


        <form action="{{ route('bookings.byStatus', 'confirmed') }}" method="GET">

            <x-button type="submit"
                      text="Confirmed"
                      color="success"
                      :outline="false" />

        </form>


        <form action="{{ route('bookings.byStatus', 'cancelled') }}" method="GET">

            <x-button type="submit"
                      text="Cancelled"
                      color="secondary"
                      :outline="false" />

        </form>


        <form action="{{ route('bookings.byStatus', 'rejected') }}" method="GET">

            <x-button type="submit"
                      text="Rejected"
                      color="danger"
                      :outline="false" />

        </form>

    </div>


    {{-- Success and Error Messages --}}

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    {{-- Bookings Table --}}

    <div class="card shadow-sm border-success-subtle rounded-3">

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover
                          align-middle mb-0">

                <thead>

                    <tr class="table-success">

                        <th scope="col" class="bg-success text-white">ID</th>

                        <th scope="col" class="bg-success text-white">SPACE ID</th>

                        <th scope="col" class="bg-success text-white">BOOKING DATE</th>

                        <th scope="col" class="bg-success text-white">STATUS</th>

                        <th scope="col" class="bg-success text-white">ACTIONS</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($bookings as $booking)

                        <tr>

                            <th scope="row">
                                {{ $booking->id }}
                            </th>

                            <td>
                                {{ $booking->space_id }}
                            </td>

                            <td>
                                {{ $booking->booking_date }}
                            </td>


                            {{-- Booking Status --}}

                            <td>

                                @if($booking->status == 'pending')

                                    <span class="badge bg-warning-subtle
                                                 text-warning-emphasis">
                                        Pending
                                    </span>

                                @elseif($booking->status == 'confirmed')

                                    <span class="badge bg-success-subtle
                                                 text-success-emphasis">
                                        Confirmed
                                    </span>

                                @elseif($booking->status == 'cancelled')

                                    <span class="badge bg-secondary-subtle
                                                 text-secondary-emphasis">
                                        Cancelled
                                    </span>

                                @elseif($booking->status == 'rejected')

                                    <span class="badge bg-danger-subtle
                                                 text-danger-emphasis">
                                        Rejected
                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="d-flex flex-wrap gap-2 align-items-center">

                                    {{-- Details --}}

                                    <form action="{{ route('bookings.details', $booking->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Details"
                                                  color="secondary"
                                                  :outline="true" />

                                    </form>


                                    @if($booking->status == 'pending')

                                        {{-- Confirm --}}

                                        <form action="{{ route('bookings.confirm', $booking->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <x-button type="submit"
                                                      text="Confirm"
                                                      color="success"
                                                      :outline="false" />

                                        </form>


                                        {{-- Reject --}}

                                        <form action="{{ route('bookings.reject', $booking->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <x-button type="submit"
                                                      text="Reject"
                                                      color="danger"
                                                      :outline="true" />

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="5" class="text-center text-secondary py-4">
                                No bookings found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
