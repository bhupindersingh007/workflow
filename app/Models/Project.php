<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

   
    // Get the route key for the model.

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Search Projects By Title and Description

    public function scopeSearch(Builder $query, string $search): void
    {

        $query->where('title', 'LIKE', "%$search%");

    }

}
