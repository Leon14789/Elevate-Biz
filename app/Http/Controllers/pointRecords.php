<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class pointRecords extends Controller
{

   
   public function insertHours(Request $request) {
      $user = Auth::User(); 
      $userId = $user->id;

      $hours = new Hour;
      $hours->user_id = $userId;
      $hours->work_date = date('Y-m-d');
      $hours->time1 = date('Y-m-d H:i:s') ;
      $hours->save();
      
      return  redirect()->route('registerPoint');
   }

   public function editHours() {
   /*
      Nesta parte pegamos pelo Id o ultimo registro encontrado
   */
      $userId = Auth::user()->id;
      $latestRecord = Hour::where('user_id', $userId)
          ->latest()
          ->first();

          /*
            Neste if pegamos o valor do ultimo registro encontrado
            verificamos se o time2 e estritamente igual a null e preenchemos ele 
            e dps fazemos um elseif para ele preencher os proximos 
            um por vez
          */
        if ($latestRecord) {
         if ($latestRecord->time2 === null) {
             $latestRecord->time2 = date('Y-m-d H:i:s');
         } elseif ($latestRecord->time3 === null) {
             $latestRecord->time3 = date('Y-m-d H:i:s');
         } elseif ($latestRecord->time4 === null) {
             $latestRecord->time4 = date('Y-m-d H:i:s');
         }
     }

          $latestRecord->save();
          return  redirect()->route('registerPoint');
   }

   /*
   Nesta função criamos uma request para poder usar caso seja chamado o inserHours 
   depois disso pegamos o Id do usuario e comparamos com o ultimo registro encontrado em 
   no user_id entao verirficamos se o time4 é null ou seja ainda nao foi preenchido 
   caso sim ele ira chamar o campo para editar ou seja ir preenchendo ate chegar no final 
   mas caso ele nao seja null
   */
      public function createOrEditRecord(Request $request) {
         $userId = Auth::user()->id;
         $latestRecord = Hour::where('user_id', $userId)
         ->latest()
         ->first();

         if ($latestRecord->time4 == null) {
            $this->editHours();
            
         } else {
            $this->insertHours($request); 
         }

         return  redirect()->route('registerPoint');
      }
  

   function listWoringHours() {
      $user = Auth::User();
      $resultPont = Hour::loadFromUserAndDate($user->id, date('Y-m-d'));
      
      if ($resultPont !== null) {
         $time1 = $resultPont->time1 !== null ? date('H:i:s', strtotime($resultPont->time1)) : '---';
         $time2 = $resultPont->time2 !== null ? date('H:i:s', strtotime($resultPont->time2)) : '---';
         $time3 = $resultPont->time3 !== null ? date('H:i:s', strtotime($resultPont->time3)) : '---';
         $time4 = $resultPont->time4 !== null ? date('H:i:s', strtotime($resultPont->time4)) : '---';
     } else {
         $time1 = '---';
         $time2 = '---';
         $time3 = '---';
         $time4 = '---';
     }
      return view('pages/point/registerPont', [
         'resultPont' => $resultPont,
         'time1' => $time1,
         'time2' => $time2,
         'time3' => $time3,
         'time4' => $time4,
      ]);
  }

 
  
}
