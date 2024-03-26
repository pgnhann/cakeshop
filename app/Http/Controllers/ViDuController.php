<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViDuController extends Controller
{
    //
    function vidu()
    {
        return view("vidu1");
    }

    function pgnhann()
    {
        echo "Test koi có bị conflict hok";
        echo "Hok conflict nha";
    }
}
