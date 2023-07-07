<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class pointRecords extends Controller
{
  

   function listWoringHours() {

    $user = Auth::User();
    $resultPont = Hour::loadFromUserAndDate($user->id, date('Y-m-d'));
    
   
    $entrada1 = date('H:i:s', strtotime($resultPont->time1));
    $saida1  = date('H:i:s', strtotime($resultPont->time2));
    $entrada2 = date('H:i:s', strtotime($resultPont->time3));
    $saida2  = date('H:i:s', strtotime($resultPont->time4));

    return view('pages/point/registerPont', [
      'resultPont' => $resultPont,
      'entrada1' => $entrada1,
      'saida1' => $saida1,
      'entrada2' => $entrada2,
      'saida2' => $saida2,
  ]);
   }
}
