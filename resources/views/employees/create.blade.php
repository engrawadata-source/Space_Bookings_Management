
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}

        <div class="card-header bg-success text-white py-3">

            <h4 class="mb-1 fw-bold">Create Employee</h4>

            <small>Enter the information of the new employee.</small>

        </div>


        {{-- Card Body --}}

        <div class="card-body p-4">

            <form action="{{ route('employees.create') }}" method="POST">

                @csrf


                {{-- Personal Information --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Personal Information
                </h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name') }}"
                               placeholder="Enter employee name">

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Phone Number</label>

                        <input type="text"
                               name="phone_number"
                               class="form-control"
                               value="{{ old('phone_number') }}"
                               placeholder="Enter phone number">

                        @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-12">

                        <label class="form-label fw-semibold">Address</label>

                        <input type="text"
                               name="address"
                               class="form-control"
                               value="{{ old('address') }}"
                               placeholder="Enter address">

                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Account Information --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Account Information
                </h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Email</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email') }}"
                               placeholder="Enter email address">

                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Password</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter password">

                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Employment Information --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Employment Information
                </h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Job Title</label>

                        <input type="text"
                               name="job_title"
                               class="form-control"
                               value="{{ old('job_title') }}"
                               placeholder="Enter job title">

                        @error('job_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Hire Date</label>

                        <input type="date"
                               name="hire_date"
                               class="form-control"
                               value="{{ old('hire_date') }}">

                        @error('hire_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Save Button --}}

                <div class="d-flex justify-content-end">

                    <x-button type="submit"
                              text="Save Employee"
                              color="success"
                              :outline="false" />

                </div>

            </form>

        </div>


        {{-- Card Footer --}}

        <div class="card-footer bg-secondary-subtle py-3">

            <form action="{{ route('employees.index') }}" method="GET">

                <x-button type="submit"
                          text="Back to Employees"
                          color="secondary"
                          :outline="true" />

            </form>

        </div>

    </div>

</div>

@endsection
