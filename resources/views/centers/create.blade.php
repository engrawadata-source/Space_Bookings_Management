
@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-success-subtle rounded-3">

        {{-- Card Header --}}

        <div class="card-header bg-success text-white py-3">

            <h4 class="mb-1 fw-bold">Create Center</h4>

            <small>Enter the information of the new center.</small>

        </div>


        {{-- Card Body --}}

        <div class="card-body p-4">

            <form action="{{ route('centers.create') }}" method="POST">

                @csrf


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
                               value="{{ old('name') }}"
                               placeholder="Enter center name">

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Contact Number</label>

                        <input type="text"
                               name="contact_number"
                               class="form-control"
                               value="{{ old('contact_number') }}"
                               placeholder="Enter contact number">

                        @error('contact_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-12">

                        <label class="form-label fw-semibold">Description</label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"
                                  placeholder="Enter center description">{{ old('description') }}</textarea>

                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Location Information --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Location Information
                </h5>

                <div class="row g-3 mb-4">

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


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">City</label>

                        <input type="text"
                               name="city"
                               class="form-control"
                               value="{{ old('city') }}"
                               placeholder="Enter city">

                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Country</label>

                        <input type="text"
                               name="country"
                               class="form-control"
                               value="{{ old('country') }}"
                               placeholder="Enter country">

                        @error('country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Latitude</label>

                        <input type="number"
                               name="latitude"
                               class="form-control"
                               step="0.0000001"
                               min="-90"
                               max="90"
                               value="{{ old('latitude') }}"
                               placeholder="Enter latitude">

                        @error('latitude')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>


                    <div class="col-md-6">

                        <label class="form-label fw-semibold">Longitude</label>

                        <input type="number"
                               name="longitude"
                               class="form-control"
                               step="0.0000001"
                               min="-180"
                               max="180"
                               value="{{ old('longitude') }}"
                               placeholder="Enter longitude">

                        @error('longitude')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>

                </div>


                {{-- Center Status --}}

                <h5 class="text-success-emphasis fw-bold border-bottom pb-2 mb-3">
                    Center Status
                </h5>

                <div class="mb-4">

                    <label class="form-label fw-semibold">Status</label>

                    <select name="status" class="form-select">

                        <option value="active"
                            {{ old('status') == 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ old('status') == 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>

                    </select>

                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>


                {{-- Save Button --}}

                <div class="d-flex justify-content-end">

                    <x-button type="submit"
                              text="Save Center"
                              color="success"
                              :outline="false" />

                </div>

            </form>

        </div>


        {{-- Card Footer --}}

        <div class="card-footer bg-secondary-subtle py-3">

            <form action="{{ route('centers.index') }}" method="GET">

                <x-button type="submit"
                          text="Back to Centers"
                          color="secondary"
                          :outline="true" />

            </form>

        </div>

    </div>

</div>

@endsection
