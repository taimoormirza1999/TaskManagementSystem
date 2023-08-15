@extends('dashboard_applayout')

@section('additional_links')
@endsection

@section('content')
<form class="w-75 m-auto" method="POST" action="{{ route('users.store') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="text-center display-7 text-primary">Create User</h4>
            <p>Please enter below information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">First Name:</label>
                <input class="form-control form-control-lg @error('name') is-invalid @enderror" type="text" name="name" required placeholder="First Name" autocomplete="off" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" name="email" required placeholder="E-mail" autocomplete="off" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input class="form-control form-control-lg @error('password') is-invalid @enderror" id="pass1" type="password" required placeholder="Password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Select Role:</label>
                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                    <!-- Add more roles as needed -->
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Create User</button>
            </div>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection
