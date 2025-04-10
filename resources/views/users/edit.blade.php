@extends('layouts.master')
@section('title', 'Edit User')
@section('content')
<link rel="stylesheet" href="{{ asset('edit.css') }}">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit User</h2>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input type="text" class="form-control" id="name" name="name" 
                           value="{{ old('name', $users->name) }}" placeholder="Enter the user's full name" required>
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" 
                           value="{{ old('email', $users->email) }}" placeholder="Enter a valid email address" required>
                </div>
            </div>
            
            <div class="col-12">
                <button type="submit" class="btn btn-secondary w-100">
                    <i class="bi bi-save"></i> Update User
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
