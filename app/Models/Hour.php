<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hour extends Model
{
   // Model referente a tabela hours ou seja horas trabalhadas ou jornada de trabalho 
   use  HasFactory;

   protected $guarded = [
      
   ];


   public static function loadFromUserAndDate($userId, $workDate) {
      $registry = self::where('user_id', $userId)
          ->where('work_date', $workDate)
          ->latest()
          ->first();
  
      return $registry ?: null;
  }

   public function getnextTime() {
      if(!$this->time1) return 'time1';
      if(!$this->time2) return 'time2';
      if(!$this->time3) return 'time3';
      if(!$this->time4) return 'time4';
      return null;

   }

  
   
}
