<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\reportsMonthly;
use App\Models\User;
use App\Models\Hour;
use Illuminate\Support\Facades\Auth;
class reportManagement extends Controller
{
    

/*
    Nesta função eu verifico os usuarios ativos no banco de dados 
    vejo tmb quem ainda nao realizou o primeiro batimento do dia 
    e a quantidade de pessoas que faltaram
*/

    public static function reportManagement() {
        $user = Auth::User(); 
        $date = new \DateTime();

       $numberUsersAbsent = 0;
       $informationsUsersAbsent = [];
        
        
       $users = User::where('end_date', NULL)->get();
       $nuberUsers = $users->count();
       


       
        foreach ($users as $user) {
            $recordExists = Hour::where('user_id', $user->id)
                ->whereDate('work_date', $date)
                ->exists();
        
            if (!$recordExists) {
                $numberUsersAbsent++;
                $informationsUsersAbsent[] = [
                    'id' => $user->id,
                    'name' => $user->name,
                ];
            }
        }
   
        return view('pages/reports/reportManagement', 
        compact([
       'numberUsersAbsent', 
        'informationsUsersAbsent',
        'nuberUsers'
      
       
       ]));
}

    

    
}
