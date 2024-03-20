<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) 
    {

        // Users API

        if(!$request->ajax()){
           return abort(404);
        }

        if($request->missing('search')){
            return response()->json(['message' => 'search parameter is required.'], 400);
        }

        // Search by first and last name, email address 

        $search = $request->search;

        $users = User::select(['id', 'first_name', 'last_name', 'email'])
                ->where('first_name', 'LIKE', "%$search%")
                ->orWhere('last_name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "%$search%")
                ->orderBy('first_name')
                ->limit(5)
                ->get();
      
      
       return $users;

    }
}
