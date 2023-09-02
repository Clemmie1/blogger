<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ConvertTime extends Controller
{
    static public function convert($time, bool $date)
    {
        Carbon::setLocale("ru");
        
        if ($date){
            return Carbon::parse($time)->diffForHumans();
        } else {
            return Carbon::parse($time)->format('d.m.Y');
        }
    }

    static public function getTimeDate($date){
        Carbon::setLocale("ru");
        return Carbon::parse($date)->isoFormat('DD MMM YYYYг. в HH:mm', 'DD MMMM YYYYг. в HH:mm');

    }
}
