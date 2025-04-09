<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeepSeekService;

class SumarizedController extends Controller
{
    public function summarize(Request $request, DeepSeekService $deepSeek)
    {
        $validated = $request->validate([
            'text' => 'required|string',
        ]);

        $summary = $deepSeek->summarize($validated['text']);

        return response()->json([
            'summary' => $summary,
        ]);
    }
}
