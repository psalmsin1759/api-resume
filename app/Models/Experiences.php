<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Responsibilities;
use \App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experiences extends Model
{
    use HasFactory;

    protected $hidden = ['id', "user_id", 'created_at', 'updated_at'];

    protected $fillable = [
        "title",
        "company",
        "date_range",
        "user_id"
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function responsibilities(): HasMany
    {
        return $this->hasMany(Responsibilities::class);
    }

}
