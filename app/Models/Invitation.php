<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Invitation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $casts = [
        'created_at' => 'date'
    ];

    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');

    }  
    
    
    public function invitedUser()
    {
        return $this->belongsTo(User::class, 'invited_user_id');

    }    

    // Invitations Status Colors

    public static function colors(string $key)
    {
        
        $colors = [
     
            'declined' => 'danger',
            'pending' => 'warning',
            'accepted' => 'success',        
        ];
        
        return $colors[$key];

    }


    // Search Invitations

    public function scopeSearchInvitations(Builder $query, string $search)
    {

        $query->Where('status', 'LIKE', "%$search%")
            ->orWhereHas('project', function ($query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
            ->orWhereHas('invitedUser', function ($query) use ($search) {
                $query->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%");
            });

    }



}
