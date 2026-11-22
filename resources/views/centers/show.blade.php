
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}

        <div class="card-header bg-success text-white py-3">

            <h4 class="mb-0 fw-bold">
                Center Details
            </h4>

        </div>


        {{-- Card Body --}}

        <div class="card-body p-4">

            <table class="table table-striped align-middle mb-0">

                <tbody>

                    <tr>
                        <th class="text-secondary">Center ID</th>
                        <td>{{ $center->id }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Name</th>
                        <td>{{ $center->name }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Description</th>
                        <td>{{ $center->description }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Address</th>
                        <td>{{ $center->address }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">City</th>
                        <td>{{ $center->city }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Country</th>
                        <td>{{ $center->country }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Latitude</th>
                        <td>{{ $center->latitude }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Longitude</th>
                        <td>{{ $center->longitude }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Contact Number</th>
                        <td>{{ $center->contact_number }}</td>
                    </tr>

                    <tr>
                        <th class="text-secondary">Status</th>

                        <td>

                            @if($center->status == 'active')

                                <span class="badge bg-success-subtle text-success-emphasis">
                                    Active
                                </span>

                            @elseif($center->status == 'inactive')

                                <span class="badge bg-secondary-subtle text-secondary-emphasis">
                                    Inactive
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

                <form action="{{ route('centers.index') }}"
                      method="GET">

                    <x-button type="submit"
                              text="Back to Centers"
                              color="secondary"
                              :outline="true" />

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
