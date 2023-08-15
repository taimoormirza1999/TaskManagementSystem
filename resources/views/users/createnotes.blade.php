@extends('dashboard_applayout')

@section('additional_links')
@endsection

@section('content')
<div class="container">
    <h1>Create Note for Project: {{ $project->title }}</h1>
    <form method="POST" action="{{ route('projects.storeNote', $project) }}">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="content">Note Content:</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer bg-white">
                <button type="submit" class="btn btn-primary">Create Note</button>
                <a href="{{ route('projects.show', $project) }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
