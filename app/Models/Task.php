<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
