@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h2 class="dashboard-header">All Lecture Summaries</h2>

        @if ($summaries->isEmpty())
            <p>No summaries found.</p>
        @else
            <table class="summary-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Title</th>
                        <th>Summary</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($summaries as $summary)
                        <tr>
                            <td>{{ $summary->user->name ?? 'Unknown' }}</td>
                            <td>{{ $summary->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($summary->summary_text, 80) }}</td>
                            <td>{{ $summary->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
