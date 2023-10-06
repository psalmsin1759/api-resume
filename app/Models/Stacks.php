<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Projects;

class Stacks extends Model
{
    use HasFactory;

    protected $hidden = ['id', 'projects_id', 'created_at', 'updated_at'];

    protected $fillable = [
        "name",
        "projects_id"
    ];

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Projects::class);
    }
}
