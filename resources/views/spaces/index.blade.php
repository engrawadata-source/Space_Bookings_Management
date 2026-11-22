
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    {{-- Page Title and Create Button --}}

    <div class="d-flex justify-content-between align-items-center mb-4
                border-bottom border-success pb-3">

        <h3 class="text-success-emphasis fw-bold mb-0">
            Spaces Management
        </h3>

        <form action="{{ route('spaces.createForm') }}" method="GET">

            <x-button type="submit"
                      text="Create Space"
                      color="success"
                      :outline="false" />

        </form>

    </div>


    {{-- Search Section --}}

    <div class="card shadow-sm border-success-subtle rounded-3 mb-4">

        <div class="card-body">

            <h5 class="text-success-emphasis fw-bold mb-3">
                Filter Spaces by Center
            </h5>

            <div class="d-flex flex-wrap gap-2 align-items-center">

                {{-- Search Form --}}

                <form action="{{ route('spaces.in.center') }}"
                      method="GET"
                      class="d-flex flex-wrap gap-2 align-items-center">

                    <label class="form-label fw-semibold mb-0">
                        Center ID:
                    </label>

                    <div>

                        <input type="number"
                               name="center_id"
                               class="form-control"
                               value="{{ old('center_id', request('center_id')) }}"
                               placeholder="Enter center ID">

                    </div>

                    <x-button type="submit"
                              text="Search"
                              color="success"
                              :outline="false" />

                </form>


                {{-- Show All Spaces --}}

                <form action="{{ route('spaces.index') }}" method="GET">

                    <x-button type="submit"
                              text="Show All Spaces"
                              color="secondary"
                              :outline="true" />

                </form>

            </div>


            @error('center_id')

                <small class="text-danger d-block mt-2">
                    {{ $message }}
                </small>

            @enderror

        </div>

    </div>


    {{-- Search Message --}}

    @if(isset($message))

        <div class="alert alert-danger">
            {{ $message }}
        </div>

    @endif


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


    {{-- Spaces Table --}}

    <div class="card shadow-sm border-success-subtle rounded-3">

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover
                          align-middle mb-0">

                <thead>

                    <tr class="table-success">

                        <th scope="col" class="bg-success text-white">ID</th>

                        <th scope="col" class="bg-success text-white">NAME</th>

                        <th scope="col" class="bg-success text-white">DESCRIPTION</th>

                        <th scope="col" class="bg-success text-white">TYPE</th>

                        <th scope="col" class="bg-success text-white">CENTER ID</th>

                        <th scope="col" class="bg-success text-white">ACTIONS</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($spaces as $space)

                        <tr>

                            <th scope="row">
                                {{ $space->id }}
                            </th>

                            <td>
                                {{ $space->name }}
                            </td>

                            <td>
                                {{ $space->description }}
                            </td>

                            <td>
                                {{ $space->type }}
                            </td>

                            <td>
                                {{ $space->center_id }}
                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="d-flex flex-wrap gap-2 align-items-center">

                                    {{-- Details --}}

                                    <form action="{{ route('spaces.details', $space->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Details"
                                                  color="secondary"
                                                  :outline="true" />

                                    </form>


                                    {{-- Edit --}}

                                    <form action="{{ route('spaces.editForm', $space->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Edit"
                                                  color="success"
                                                  :outline="true" />

                                    </form>


                                    {{-- Delete --}}

                                    <form action="{{ route('spaces.destroy', $space->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <x-button type="submit"
                                                  text="Delete"
                                                  color="danger"
                                                  :outline="true" />

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="6" class="text-center text-secondary py-4">
                                No spaces found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
