<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class main extends Controller
{
    //

function index()
    {
        return view('admin.index');
    }

function logout()
    {
        Session::flush(); 
        return redirect()->route('login'); 
    }

function setting()
    {
        $signin = DB::table("login")->whereRaw("phone=?",[Auth::user()->phone])->first();
        $info = DB::table("admin")->whereRaw("phone=?", $signin->phone)->first();

        // $signin = DB::table("login")->whereRaw("phone=?",[Auth::user()->phone])->first();
        // $info = DB::table("customer")->whereRaw("phone=?", $signin->phone)->first();
        
        // $user = User::with(['login', 'customer'])->where('phone', Auth::user()->phone)->first();
    
        return view("admin.settingacc", compact("info"));
    }

function saveinfo(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'string']
        ]);

        $datalogin = 
        [
            "username" => $request->input("username"),
            "password" => $request->input("pass"),
            "phone" => $request->input('phone'),
            "email" => $request->input('email')
        ];

        $dataadmin =
        [
            "id_branch" => $request->input("idbranch"),
            "name" => $request->input("name"),
            "date" => $request->input("date"),
            "sex" => $request->input("sex"),
            "email" => $request->input("email"),
            "position" => $request->input("posi")
        ];
    
        DB::transaction(function() use($datalogin, $dataadmin) 
        {
            DB::table("login")->where("phone", $datalogin["phone"])->update($datalogin);
            DB::table("admin")->where("phone", $datalogin["phone"])->update($dataadmin);
        });

        return redirect()->route('admin.setting')->with('status', 'LƯU THÀNH CÔNG!');
    }
}
