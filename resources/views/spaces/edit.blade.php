
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}

        <div class="card-header bg-success text-white py-3">

            <h4 class="mb-1 fw-bold">Edit Space</h4>

            <small>Update the information of the selected space.</small>

        </div>


        {{-- Card Body --}}

        <div class="card-body p-4">

            <form action="{{ route('spaces.edit', $space->id) }}" method="POST">

                @csrf
                @method('PUT')


                {{-- Basic Information --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Basic Information
                </h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Name</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ old('name', $space->name) }}"
                               placeholder="Enter space name">

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Type</label>

                        <input type="text"
                               name="type"
                               class="form-control"
                               value="{{ old('type', $space->type) }}"
                               placeholder="Enter space type">

                        @error('type')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-12">

                        <label class="form-label fw-semibold">Description</label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter space description">{{ old('description', $space->description) }}</textarea>

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Space Specifications --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Space Specifications
                </h5>

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Max Capacity</label>

                        <input type="text"
                               name="max_capacity"
                               class="form-control"
                               value="{{ old('max_capacity', $space->max_capacity) }}"
                               placeholder="Enter maximum capacity">

                        @error('max_capacity')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Hourly Price</label>

                        <input type="text"
                               name="hourly_price"
                               class="form-control"
                               value="{{ old('hourly_price', $space->hourly_price) }}"
                               placeholder="Enter hourly price">

                        @error('hourly_price')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Space Status --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Space Status
                </h5>

                <div class="mb-4">

                    <label class="form-label fw-semibold">Status</label>

                    <select name="status" class="form-select">

                        <option value="available"
                            @selected(old('status', $space->status) == 'available')>
                            Available
                        </option>

                        <option value="maintenance"
                            @selected(old('status', $space->status) == 'maintenance')>
                            Maintenance
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                {{-- Update Button --}}

                <div class="d-flex justify-content-end">

                    <x-button type="submit"
                              text="Update Space"
                              color="success"
                              :outline="false" />

                </div>

            </form>

        </div>


        {{-- Card Footer --}}

        <div class="card-footer bg-secondary-subtle py-3">

            <form action="{{ route('spaces.index') }}" method="GET">

                <x-button type="submit"
                          text="Back to Spaces"
                          color="secondary"
                          :outline="true" />

            </form>

        </div>

    </div>

</div>

@endsection
