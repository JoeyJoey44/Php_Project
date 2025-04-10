@extends('layouts.master')
@section('title', 'Show User')
@section('content')
<link rel="stylesheet" href="{{ asset('show.css') }}">
<link rel="stylesheet" href="{{ asset('index.css') }}"> <!-- Importing the CSS file -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}"> <!-- Importing the CSS file -->

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>User Details</h2>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>

        <div class="card-body">
            <div class="row g-3">
                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control bg-white" 
                                   value="{{ $users->name }}" readonly>
                        </div>
                    </div>
                </div>
                
                <!-- Email Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label text-muted">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-envelope-fill"></i>
                            </span>
                            <input type="text" class="form-control bg-white" 
                                   value="{{ $users->email }}" readonly>
                        </div>
                    </div>
                </div>
            </div>


    </div>
</div>
@endsection