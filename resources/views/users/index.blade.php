@extends('layouts.master')
@section('title', 'User List')
@section('content')


<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="{{ route('welcome.index') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-left"></i> Back to Home
            </a>
            <h2 class="mb-0 d-inline-block">User List</h2>
        </div> <a href="{{ route('users.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus"></i> Create New User
        </a>

    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('users.show',$item->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye">Show</i>
                        </a>
                        <a href="{{ route('users.edit',$item->id) }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-pencil">Edit</i>
                        </a>
                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection