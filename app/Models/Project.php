<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Search Projects By Title and Description

    public function scopeSearch(Builder $query, string $search): void
    {

        $query->where('title', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%");

    }

}
