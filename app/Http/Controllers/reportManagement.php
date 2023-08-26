<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\reportsMonthly;
use App\Models\User;
use App\Models\Hour;
use Illuminate\Support\Facades\Auth;
class reportManagement extends Controller
{
    


    

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

    public static function getWorkedTimeInMonth($yearAndMonth) {
        $startDate = new \DateTime("{$yearAndMonth}-1");
        $endDate = getLastDayMonthly("{$yearAndMonth}");

    }

    public static function getActiveUsersCont() {
        //Crie uma funcao que pegue todos os usuarios que nao tenham o 
        //end_date setados
    }
}
