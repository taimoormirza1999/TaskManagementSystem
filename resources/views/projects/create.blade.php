@extends('dashboard_applayout')

@section('additional_links')
@endsection

@section('content')
<form class="w-75 m-auto" method="POST" action="{{ route('projects.store') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="text-center display-7 text-primary">Create Project Task</h4>
            <p>Please enter below information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Task Title:</label>
                <input class="form-control form-control-lg @error('title') is-invalid @enderror" type="text" name="title" required placeholder="Project Task Title" autocomplete="off" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control form-control-lg @error('description') is-invalid @enderror" name="description" rows="4" required placeholder="Task Description">{{ old('description') }}</textarea>
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
            <div class="form-group">
                <label for="template_id">Select Template:</label>
                <select class="form-control @error('template_id') is-invalid @enderror" name="template_id" id="template_id" required>
                    <option value="" disabled selected>Select Template</option>
                    @foreach($templates as $template)
                        <option value="{{ $template->id }}">{{ $template->title }}</option>
                    @endforeach
                </select>
                @error('template_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="assigned_user_id">Assign to User:</label>
                <select class="form-control @error('assigned_user_id') is-invalid @enderror" name="assigned_user_id" id="assigned_user_id" required>
                    <option value="" disabled selected>Select User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('assigned_user_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Create Project</button>
            </div>
        </div>
        <div class="card-footer bg-white">
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection
