<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\User;

class Skills extends Model
{
    use HasFactory;

    protected $hidden = ['id', "user_id", 'created_at', 'updated_at'];

    protected $fillable = [
        "name",
        "user_id"
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
