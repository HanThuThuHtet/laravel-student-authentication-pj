@extends('layouts.master')
@section('title')
    Register
@endsection
@section('content')
    <div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Student Register</h4>
        <form action="{{ route('auth.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control
                @error('name')
                    is-invalid
                @enderror" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control
                @error('email')
                    is-invalid
                @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control
                @error('password')
                    is-invalid
                @enderror" name="password">
                @error('password')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Confirm password</label>
                <input type="password" class="form-control
                @error('password_confirmation')
                    is-invalid
                @enderror" name="password_confirmation">
                @error('password_confirmation')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-warning">Register Now</button>
            </div>

        </form>
    </div>
    </div>
@endsection
