@extends('layouts.master')
@section('title', 'Show User')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

 

    <div class="dashboard-container container">
        <h2 class="dashboard-header text-white">All Lecture Summaries</h2>

        @if ($summaries->isEmpty())
            <p>No summaries found.</p>
        @else
        <table class="table  align-middle">
            <thead class="thead-dark">
                <tr>
                    <th>User</th>
                    <th>Date</th>
                    <th>Actions</th> <!-- New column for the view icon -->
                </tr>
            </thead>
            <tbody>
                @foreach ($summaries as $summary)
                    <tr>
                        <td>{{ $summary->user->name ?? 'Unknown' }}</td>
                        <td>{{ $summary->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.summaries.show', $summary->id) }}" class="btn btn-outline-primary btn-sm" title="View">
                                View <!-- Bootstrap Icons eye -->
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        @endif
    </div>

@endsection
