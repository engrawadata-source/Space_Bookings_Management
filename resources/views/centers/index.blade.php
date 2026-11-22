
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    {{-- Page Title and Create Button --}}

    <div class="d-flex justify-content-between align-items-center mb-4
                border-bottom border-success pb-3">

        <h3 class="text-success-emphasis fw-bold mb-0">
            Centers Management
        </h3>

        <form action="{{ route('centers.createForm') }}" method="GET">

            <x-button type="submit"
                      text="Create Center"
                      color="success"
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


    {{-- Centers Table --}}

    <div class="card shadow-sm border-success-subtle rounded-3">

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover
                          align-middle mb-0">

                <thead>
                    <tr class="table-success">
                        <th scope="col" class="bg-success text-white">ID</th>
                        <th scope="col" class="bg-success text-white">NAME</th>
                        <th scope="col" class="bg-success text-white">DESCRIPTION</th>
                        <th scope="col" class="bg-success text-white">COUNTRY</th>
                        <th scope="col" class="bg-success text-white">STATUS</th>
                        <th scope="col" class="bg-success text-white">ACTIONS</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($centers as $center)

                        <tr>

                            <th scope="row">
                                {{ $center->id }}
                            </th>

                            <td>
                                {{ $center->name }}
                            </td>

                            <td>
                                {{ $center->description }}
                            </td>

                            <td>
                                {{ $center->country }}
                            </td>

                            <td>
                                @if($center->status == 'active')

                                    <span class="badge bg-success-subtle
                                                 text-success-emphasis">
                                        Active
                                    </span>

                                @elseif($center->status == 'inactive')

                                    <span class="badge bg-secondary-subtle
                                                 text-secondary-emphasis">
                                        Inactive
                                    </span>

                                @endif
                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="d-flex flex-wrap gap-2 align-items-center">

                                    {{-- Details --}}

                                    <form action="{{ route('centers.details', $center->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Details"
                                                  color="secondary"
                                                  :outline="true" />

                                    </form>


                                    {{-- Edit --}}

                                    <form action="{{ route('centers.editForm', $center->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Edit"
                                                  color="success"
                                                  :outline="true" />

                                    </form>


                                    {{-- Delete --}}

                                    <form action="{{ route('centers.destroy', $center->id) }}"
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
                                No centers found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
