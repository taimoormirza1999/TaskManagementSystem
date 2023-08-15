@extends('layouts.app')

@section('content')
<form class="splash-container" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class=" text-center display-7 text-primary">Registration Form</h4>
            <p>Please enter below information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" required placeholder="Username" autocomplete="off" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" required placeholder="E-mail" autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="pass1" type="password" required placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" required placeholder="Confirm Password" type="password" name="password_confirmation">
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="agree" id="agree">
                    <span class="custom-control-label">By creating an account, you agree to the <a href="#">terms and conditions</a></span>
                </label>
            </div>

        </div>
        <div class="card-footer bg-white">
            <p>Already a member? <a href="{{ route('login') }}" class="text-secondary">Login Here.</a></p>
        </div>
    </div>
</form>
@endsection
