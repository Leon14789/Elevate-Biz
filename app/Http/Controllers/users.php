<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class users extends Controller

{
    public function users() {
       
        $users = User::All(); 

        foreach($users as $user) {
            $user->start_date = (new \DateTime($user->start_date))->format('d/m/Y');

            if ($user->end_date == Null) {
                $user->end_date = "-----";

            } else {
                $user->end_date = (new \DateTime($user->end_date))->format('d/m/Y');
            }

            

        }
        
        
        return view('pages/users/users', compact([
            'users',
            
            

        ]));
    }
}
