@extends('dashboard_applayout')

@section('additional_links')
@endsection

@section('content')
<form class="w-75 m-auto" method="POST" action="{{ route('templates.store') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="text-center display-7 text-primary">Create Project Template</h4>
            <p>Please enter below information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Project Title:</label>
                <input class="form-control form-control-lg @error('title') is-invalid @enderror" type="text" name="title" required placeholder="Project Title" autocomplete="off" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" name="description" rows="4" required placeholder="Project Description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="due_date">Due Date:</label>
                <input class="form-control form-control-lg @error('due_date') is-invalid @enderror" type="date" name="due_date" required value="{{ old('due_date') }}">
                @error('due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Create Template</button>
            </div>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
