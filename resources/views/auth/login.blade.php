@extends('layouts.app')

@section('content')
<div class="splash-container">
    <div class="card">
        <div class="card-header text-center">
            <h4 class="display-7 text-primary">{{ __('Login') }}</h4>
            <span class="splash-description">Fill the below information.</span></div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" type="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="custom-control-label">{{ __('Remember Me') }}</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg btn-block">{{ __('Sign in') }}</button>
            </form>
        </div>
        <div class="card-footer bg-white p-0">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{ route('register') }}" class="footer-link">{{ __('Create An Account') }}</a>
            </div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{ route('password.request') }}" class="footer-link">{{ __('Forgot Password') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
