<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataGeneratorController extends Controller
{
   function getDateAsDateTime($date) {
    return is_string($date) ? new DateTime($date) : $date;
   }

   function isWeekend($date) {
        $inputDate = getDateAsDateTime($date);
        return $inputDate->format('N') >= 5;
   }

   function isBefore($date1, $date2) {
        $inputDate1 = getDateAsDateTime($date1);
        $inputDate2 = getDateAsDateTime($date2);
        return $inputDate1 <= $inputDate2;
   }

   function nextDay($date) {
    $inputDate = getDateAsDateTime($date);
    $inputDate->modify(' + 1 Dia');
    return $inputDate;
   }
}
