@extends('layouts.master')
@section('title')
    Verify Email
@endsection
@section('content')
<div class="row">
    <div class="col-12 mx-auto bg-light p-5 rounded-md">
        <h4 class="mb-3">Verify Email</h4>
        <form action="{{ route('auth.email-verify')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Enter Verification Code</label>
                <input type="text" class="form-control
                @error('verify_code')
                    is-invalid
                @enderror" name="verify_code" value="{{ old('verify_code') }}">
                @error('verify_code')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-warning">Confirm</button>
            </div>

        </form>
    </div>
    </div>
@endsection
