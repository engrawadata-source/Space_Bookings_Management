@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-items-center"
     style="min-height: 75vh;">

    <div class="card border-success shadow rounded-4"
         style="width: 400px; max-width: 100%;">

        <div class="card-header bg-success text-white text-center py-3">

            <h4 class="mb-1">Welcome Back</h4>
            <small>Center & Space Booking System</small>

        </div>

        <div class="card-body p-4">

            <h5 class="text-success mb-4">Login to your account</h5>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email
                    </label>

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter your email"
                           required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>

                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Enter your password"
                           required>
                </div>

                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="text-end mt-4">

                    <x-button type="submit"
                              text="Login"
                              color="success" />

                </div>
            </form>

        </div>

    </div>

</div>

@endsection
