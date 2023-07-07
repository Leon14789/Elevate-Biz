<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;

class reportsMonthly extends Controller
{

    function teste() {

        $woringHouyrs = Hour::all();
     
        return view('pages/reports/reportsMonthly', compact('woringHouyrs'));
    }
}
