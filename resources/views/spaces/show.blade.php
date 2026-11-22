
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}

        <div class="card-header bg-success text-white py-3">

            <h4 class="mb-0 fw-bold">
                Space Details
            </h4>

        </div>


        {{-- Card Body --}}

        <div class="card-body p-4">

            <table class="table table-striped align-middle mb-0">

                <tbody>

                    <tr>
                        <th class="text-secondary">Space ID</th>
                        <td>{{ $space->id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Name</th>
                        <td>{{ $space->name }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Description</th>
                        <td>{{ $space->description }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Type</th>
                        <td>{{ $space->type }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Center ID</th>
                        <td>{{ $space->center_id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Max Capacity</th>
                        <td>{{ $space->max_capacity }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Hourly Price</th>

                        <td class="text-success-emphasis fw-bold">
                            {{ $space->hourly_price }}
                        </td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Status</th>

                        <td>

                            @if($space->status == 'available')

                                <span class="badge bg-success-subtle text-success-emphasis">
                                    Available
                                </span>

                            @elseif($space->status == 'maintenance')

                                <span class="badge bg-warning-subtle text-warning-emphasis">
                                    Maintenance
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

                <form action="{{ route('spaces.index') }}"
                      method="GET">

                    <x-button type="submit"
                              text="Back to Spaces"
                              color="secondary"
                              :outline="true" />

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
