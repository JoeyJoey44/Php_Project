<?php

namespace App\Http\Controllers;

use App\Models\Summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    $summaries = Summary::where('user_id', Auth::id())
    ->orderBy('created_at', 'desc')
    ->get();

return response()->json($summaries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary_text' => 'required|string',
        ]);
    
        $summary = Summary::create([
            'user_id' => Auth::id(), // links summary to currently logged-in user
            'title' => $request->input('title'),
            'summary_text' => $request->input('summary_text'),
        ]);
    
        return response()->json([
            'message' => 'Summary saved successfully!',
            'summary' => $summary,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Summary $summary)
    {
        
    if ($summary->user_id !== Auth::id()) {
        return response()->json(['error' => 'Unauthorized'], 403);
    }

    return response()->json($summary);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Summary $summary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Summary $summary)
    {
        if ($summary->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $request->validate([
            'title' => 'string|max:255',
            'summary_text' => 'string',
        ]);
    
        $summary->update($request->only('title', 'summary_text'));
    
        return response()->json([
            'message' => 'Summary updated successfully!',
            'summary' => $summary,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Summary $summary)
    {
        if ($summary->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }
    
        $summary->delete();
    
        return response()->json(['message' => 'Summary deleted successfully.']);
    }
    public function all()
{
    // Optionally add role check: if (!Auth::user()->is_admin) { ... }
    $summaries = Summary::orderBy('created_at', 'desc')->get();
    return response()->json($summaries);
}
public function adminIndex()
{
    $summaries = Summary::with('user')->orderBy('created_at', 'desc')->get();
    return view('admin.summaries.index', compact('summaries'));
}

}
