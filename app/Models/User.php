<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Education;
use \App\Models\Skills;
use \App\Models\Experiences;
use \App\Models\Projects;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;
    
    protected $hidden = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        "name",
        "title",
        "about",
        "phone",
        "email",
        "portfolio_url",
        "github_url",
        "linkedin_url",
    ];

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function skills()
    {
        return $this->hasMany(Skills::class);
    }

    public function experiences()  : HasMany
    {
        return $this->hasMany(Experiences::class);
    }

    public function projects()  : HasMany
    {
        return $this->hasMany(Projects::class);
    }
}
