<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Summary;

class SummaryAdminController extends Controller
{
    public function index()
    {
        $summaries = Summary::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.summaries.index', compact('summaries'));
    }
}
