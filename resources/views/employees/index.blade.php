
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    {{-- Page Title and Create Button --}}

    <div class="d-flex justify-content-between align-items-center mb-4
                border-bottom border-success pb-3">

        <h3 class="text-success-emphasis fw-bold mb-0">
            Employees Management
        </h3>

        <form action="{{ route('employees.createForm') }}" method="GET">

            <x-button type="submit"
                      text="Create Employee"
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


    {{-- Employees Table --}}

    <div class="card shadow-sm border-success-subtle rounded-3">

        <div class="table-responsive">

            <table class="table table-bordered table-striped table-hover
                          align-middle mb-0">

                <thead>

                    <tr class="table-success">

                        <th scope="col" class="bg-success text-white">ID</th>

                        <th scope="col" class="bg-success text-white">USER ID</th>

                        <th scope="col" class="bg-success text-white">NAME</th>

                        <th scope="col" class="bg-success text-white">EMAIL</th>

                        <th scope="col" class="bg-success text-white">PHONE NUMBER</th>

                        <th scope="col" class="bg-success text-white">ADDRESS</th>

                        <th scope="col" class="bg-success text-white">JOB TITLE</th>

                        <th scope="col" class="bg-success text-white">HIRE DATE</th>

                        <th scope="col" class="bg-success text-white">ACTIONS</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($employees as $employee)

                        <tr>

                            <th scope="row">
                                {{ $employee->id }}
                            </th>

                            <td>
                                {{ $employee->user_id }}
                            </td>

                            <td>
                                {{ $employee->user->name }}
                            </td>

                            <td>
                                {{ $employee->user->email }}
                            </td>

                            <td>
                                {{ $employee->user->phone_number }}
                            </td>

                            <td>
                                {{ $employee->user->address }}
                            </td>

                            <td>
                                {{ $employee->job_title }}
                            </td>

                            <td>
                                {{ $employee->hire_date }}
                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="d-flex flex-wrap gap-2 align-items-center">

                                    {{-- Edit --}}

                                    <form action="{{ route('employees.editForm', $employee->id) }}"
                                          method="GET">

                                        <x-button type="submit"
                                                  text="Edit"
                                                  color="success"
                                                  :outline="true" />

                                    </form>


                                    {{-- Delete --}}

                                    <form action="{{ route('employees.destroy', $employee->id) }}"
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

                            <td colspan="9" class="text-center text-secondary py-4">
                                No employees found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
