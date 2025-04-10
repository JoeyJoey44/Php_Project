@extends('layouts.master')
@section('title', 'Show Lecture')
@section('content')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container mt-4">
        <h2 class="mb-3">Lecture Summary Details</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $summary->title }}</h5>

                <p><strong>User:</strong> {{ $summary->user->name ?? 'Unknown' }}</p>
                <p><strong>Summary:</strong></p>
                <div>{!! $summary->summary!!}</div>

                <p class="mt-3"><strong>Date:</strong> {{ $summary->created_at->format('Y-m-d H:i') }}</p>

                @if (!empty($summary->video_path))
                    <p><strong>Video:</strong></p>
                    <video width="480" height="280" controls class="rounded shadow">
                        <source src="{{ route('admin.video.stream', basename($summary->video_path)) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <p><strong>Video:</strong> <span class="text-muted">Not available</span></p>
                @endif
            </div>
        </div>

        <a href="{{ route('admin.summaries.index') }}" class="btn btn-secondary mt-3">Back to Summaries</a>
    </div>

@endsection
