<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class Education extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        "institution",
        "degree",
        "date-range",
        "user_id"
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
