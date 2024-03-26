<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Promotion2Controller extends Controller
{
    //
    public function insertdata(){
        DB::insert("insert into promotion2(name,desc) values('name1','desc1');");
    }
}
