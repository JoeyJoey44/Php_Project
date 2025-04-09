<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Services\DeepSeekService;

class MediaController extends Controller
{
    protected $deepSeek;

    // Constructor-based injection
    public function __construct(DeepSeekService $deepSeek)
    {
        $this->deepSeek = $deepSeek;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:mp3,mp4,wav,m4a,mov,avi,mkv|max:204800',
        ]);

        $path = $request->file('file')->store('uploads');
        $fullPath = Storage::path($path);

        if (!file_exists($fullPath)) {
            return response()->json([
                'error' => 'File not found at: ' . $fullPath,
            ], 404);
        }

        $response = Http::timeout(120) // 2 minutes
        ->attach(
            'audio',
            file_get_contents($fullPath),
            basename($fullPath)
        )->post('http://4.239.246.178:5001/transcribe');
    
        if (!$response->successful()) {
            return response()->json([
                'error' => 'Transcription failed',
                'details' => $response->json(),
            ], $response->status());
        }

        $transcript = $response->json()['text'];

        // 🧠 Call DeepSeek service to summarize
        $summary = $this->deepSeek->summarize($transcript);

        if (isset($summary['error'])) {
            return response()->json(['error sum' => $summary['error']], 500);
        }

        return response()->json([
            'transcript' => $transcript,
            'summary' => $summary,
        ]);
    }
}
