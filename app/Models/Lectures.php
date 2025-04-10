<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',          // Video name
        'transcript',    // Full transcript
        'summary',       // Summary of transcript
        'video_path'     // Path to uploaded video file
    ];

    
    /**
     * Get the user that uploaded the lecture.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
