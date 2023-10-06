<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Experiences;

class Responsibilities extends Model
{
    use HasFactory;

    protected $hidden = ['id', "experiences_id", 'created_at', 'updated_at'];

    protected $fillable = [
        "details",
        "experiences_id"
    ];

    public function experiences(): BelongsTo
    {
        return $this->belongsTo(Experiences::class);
    }
}
