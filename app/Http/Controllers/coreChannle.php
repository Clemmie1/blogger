<?php

namespace App\Http\Controllers;

use App\Models\Channle;
use Illuminate\Http\Request;

class coreChannle extends Controller
{
    static public function getUsername(int $id)
    {
        $get = Channle::where('id', $id)->first();
        return $get->username;
    }

    static public function getAllInfo(int $id)
    {
        $get = Channle::where('id', $id)->first();
        return $get;
    }

}
