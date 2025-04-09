<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'body'
    ];


    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}