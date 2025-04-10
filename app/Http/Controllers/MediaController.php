<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Services\DeepSeekService;
use App\Models\Lectures;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class MediaController extends Controller
{
    protected $deepSeek;

    public function __construct(DeepSeekService $deepSeek)
    {
        $this->deepSeek = $deepSeek;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:mp3,mp4,wav,m4a,mov,avi,mkv|max:204800',
        ]);

        // Store file in local disk under uploads/
        $path = $request->file('file')->store('uploads', 'local');
        $fullPath = storage_path('app/private/' . $path); // fixed path — don't use 'private/'

        // Ensure file exists
        if (!file_exists($fullPath)) {
            return response()->json([
                'error' => 'File not found at: ' . $fullPath,
                'stored_path' => $path,
                'expected_folder' => dirname($fullPath),
                'disk' => config('filesystems.default'),
            ], 404);
        }

        // Transcribe via external API
        $response = Http::timeout(120)->attach(
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

        // Summarize using DeepSeek
        $summary = $this->deepSeek->summarize($transcript);

        if (isset($summary['error'])) {
            return response()->json(['error' => $summary['error']], 500);
        }

        $user = null;
        try {
            if ($token = JWTAuth::getToken()) {
                $user = JWTAuth::authenticate($token);
            }
        } catch (\Exception $e) {
            Log::warning('JWT auth failed or missing: ' . $e->getMessage());
        }

        // Save if user is logged in
        $lecture = null;
        if ($user) {
            $lecture = Lectures::create([
                'user_id' => $user->id,
                'name' => $request->file('file')->getClientOriginalName(),
                'transcript' => $transcript,
                'summary' => $summary,
                'video_path' => $path,
            ]);
            Log::info('Lecture saved for user ID ' . $user->id);
        }

        return response()->json([
            'message' => 'File processed successfully',
            'lecture' => $lecture,
            'transcript' => $transcript,
            'summary' => $summary,
        ]);
    }
}
