<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meme extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "caption",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
