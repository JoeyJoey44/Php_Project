<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Summary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'summary_text',
    ];

    // Optional: define relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
