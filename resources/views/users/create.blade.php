@extends('layouts.master')
@section('title', 'Add Users')
@section('content')
<link rel="stylesheet" href="{{ asset('create.css') }}">
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add New User</h2>
       
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

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        
        <div class="row g-3">
            <!-- Name Field -->
            <div class="col-md-6">
                <label for="name" class="form-label">Full Name</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-person-fill"></i>
                    </span>
                    <input type="text" class="form-control" id="name" name="name" 
                           placeholder="Enter the user's full name" required>
                </div>
            </div>
            
            <!-- Email Field -->
            <div class="col-md-6">
                <label for="email" class="form-label">Email Address</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" 
                           placeholder="Enter a valid email address" required>
                </div>
            </div>
            
            <!-- Password Field -->
            <div class="col-md-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="Create a strong password" required>
                </div>
            </div>
            
            <!-- Confirm Password Field -->
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    <input type="password" class="form-control" id="password_confirmation" 
                           name="password_confirmation" placeholder="Re-enter the password" required>
                </div>
            </div>
            
            <!-- Submit Button -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-save"></i> Create User Account
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
