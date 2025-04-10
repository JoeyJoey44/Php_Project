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
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:mp3,mp4,wav,m4a,mov,avi,mkv|max:204800',
        ]);

        // Store the file under storage/app/uploads
        $path = $request->file('file')->store('uploads', 'local');
        $fullPath = storage_path('app/private/' . $path);

        // Check if the file actually exists
        if (!file_exists($fullPath)) {
            return response()->json([
                'error' => 'File not found',
                'stored_path' => $path,
                'expected_location' => $fullPath,
            ], 404);
        }

        // Send file to external transcription API
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

        // Get summary from DeepSeek
        $summary = $this->deepSeek->summarize($transcript);

        if (isset($summary['error'])) {
            return response()->json([
                'error' => 'Summary failed',
                'details' => $summary['error'],
            ], 500);
        }

        // Try to get authenticated user (if token is provided)
        $user = null;
        try {
            if ($token = JWTAuth::getToken()) {
                $user = JWTAuth::authenticate($token);
            }
        } catch (\Exception $e) {
            Log::info('Unauthenticated upload (guest or invalid token): ' . $e->getMessage());
        }

        // Save the lecture only if user is authenticated
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
        } else {
            Log::info('Guest upload completed');
        }

        // Return response
        return response()->json([
            'message' => 'File processed successfully',
            'transcript' => $transcript,
            'summary' => $summary,
            'lecture' => $lecture,
            'is_guest' => $user === null,
        ]);
    }
}
