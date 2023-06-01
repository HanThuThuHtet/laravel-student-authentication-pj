@extends('layouts.master')
@section('title')
    Change Password
@endsection
@section('content')
<div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Change Password</h4>
        <form action="{{ route('auth.password-change')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Current Password</label>
                <input type="password" class="form-control
                @error('current_password')
                    is-invalid
                @enderror" name="current_password" value="{{ old('current_password') }}">
                @error('current_password')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">New Password</label>
                <input type="password" class="form-control
                @error('password')
                    is-invalid
                @enderror" name="password" value="{{ old('password') }}">
                @error('password')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password Confirmation</label>
                <input type="password" class="form-control
                @error('password_confirmation')
                    is-invalid
                @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-warning">Change Password</button>
            </div>

        </form>
    </div>
    </div>
@endsection
