<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Stacks;
use \App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projects extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        "name",
        "url",
        "description",
        "repository",
        "user_id"
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stacks(): HasMany
    {
        return $this->hasMany(Stacks::class);
    }
}
