<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lectures;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class SummaryAdminController extends Controller
{
    public function index()
    {
        $summaries = Lectures::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.summaries.index', compact('summaries'));
    }

    public function show($id)
    {
        $summary = Lectures::with('user')->findOrFail($id);
        return view('admin.summaries.show', compact('summary'));
    }

    public function streamVideo($filename)
    {
        $path = "private/uploads/{$filename}";
    
        if (!Storage::disk('local')->exists($path)) {
            abort(404, 'Video not found');
        }
    
        $absolutePath = Storage::disk('local')->path($path);
        return Response::file($absolutePath, [
            'Content-Type' => 'video/mp4',
        ]);
    }
}
