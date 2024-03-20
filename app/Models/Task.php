<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $casts = [
        'deadline_date' => 'date'
    ];

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

    
    // task status and priorities colors

    public static function colors(string $key)
    {
        
        $colors = [
            
            // status 
            'todo' => 'danger',
            'in progress' => 'warning',
            'done' => 'success',
            'need discussion' => 'primary',
            
            // priorities
            'low' => 'primary',
            'medium' => 'warning',
            'high' => 'danger',
        
        ];

        return $colors[$key];

    }

    


    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');

    }    


    // Search Project Tasks

    public function scopeSearchProjectTasks(Builder $query, string $search)
    {

        $query->where('title', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%")
            ->orWhere('priority', 'LIKE', "%$search%")
            ->orWhere('deadline_date', 'LIKE', "%$search%")
            ->orWhereHas('assignedTo', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%");
            });

    }


    // Search Tasks

    public function scopeSearchTasks(Builder $query, string $search)
    {

        $query->where('title', 'LIKE', "%$search%")
            ->orWhere('status', 'LIKE', "%$search%")
            ->orWhere('priority', 'LIKE', "%$search%")
            ->orWhere('deadline_date', 'LIKE', "%$search%")
            ->orWhereHas('project', function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
            ->orWhereHas('assignedBy', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%");
            });

    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class, 'task_id')->orderBy('id', 'DESC');
    }



}
