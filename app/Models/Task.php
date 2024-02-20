<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];


    // task status 

    public static function statuses()
    {
        return [ 'todo', 'in progress', 'done', 'need discussion' ];
    } 


    // task priorities

    public static function priorities()
    {
        return [ 'low', 'medium', 'high' ];

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function scopeSearch(Builder $query, string $search): void
    {

        $query->where('title', 'LIKE', "%$search%");

    }

    public function scopeFilter(Builder $query, string $status = null, string $priority = null): void
    {

        $query->where('status', $status)->orWhere('priority', $priority);

    }


}
