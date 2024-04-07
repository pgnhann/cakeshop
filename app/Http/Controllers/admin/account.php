<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class account extends Controller
{

function main()
    {
        $qlnv = DB::select("SELECT a.position, l.phone, l.username, l.password, a.name, a.sex, a.date, a.email
                            FROM login l, admin a
                            WHERE l.phone = a.phone");
        return view('admin.account.accmain',compact("qlnv"));
    }

function user()
    {
        $qlnd = DB::table("user")->get();
        return view('admin.account.user',compact("qlnd"));
    }

function formaddstaff()
    {
        return view('admin.account.addstaff');
    }

function addstaff(Request $request)
    {
        $sdt = $request->input('sdt');
        $username = $request->input('username');
        $pass = $request->input('pass');
        $name = $request->input('name');
        $sex = $request->input('sex');
        $date = $request->input('date');
        $email = $request->input('email');
        $posi = $request->input('posi');
    
        $role = ($posi === 'Nhân viên') ? 2 : 1;
    
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'sdt' => ['nullable', 'string']
        ]);
    
        $datalogin = [
            "username" => $username,
            "password" => $pass,
            "phone" => $sdt,
            "name" => $name,
            "email" => $email
        ];

        $dataadmin = [
            "phone" => $sdt,
            "name" => $name,
            "date" => $date,
            "sex" => $sex,
            "email" => $email,
            "position" => $posi
        ];
    
        DB::transaction(function() use($datalogin, $dataadmin) 
        {
            DB::table("login")->insert($datalogin);
            DB::table("admin")->insert($dataadmin);
        });
    
        return redirect()->route('account.main')->with('status', 'THÊM QUẢN TRỊ VIÊN THÀNH CÔNG!');
    }
    

function formupdatestaff($sdt)
    {
        $staff = DB::table('admin')
                    ->join('login', 'admin.phone', '=', 'login.phone')
                    ->where('admin.phone', $sdt)
                    ->select('admin.*', 'login.username', 'login.password')
                    ->first();
        return view('admin.account.updatestaff', compact('staff'));
    }

function updatestaff(Request $request)
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
            "phone" => $request->input('sdt'),
            "email" => $request->input('email')
        ];

        $dataadmin =
        [
            "id_branch" => $request->input("idbranch"),
            "name" => $request->input("name"),
            "date" => $request->input("date"),
            "sex" => $request->input("sex"),
            "email" => $request->input("email"),
        ];
    
        DB::transaction(function() use($datalogin, $dataadmin) 
        {
            DB::table("login")->where("phone", $datalogin["phone"])->update($datalogin);
            DB::table("admin")->where("phone", $datalogin["phone"])->update($dataadmin);
        });

        return redirect()->route('account.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');
    }

function giverole(Request $request)
    {
        $sdt = $request->input('sdt');
        $posi = $request->input('posi');
        $role = 0;

        if ($posi == "Quản lý") 
        {
            $role = 1;
        } 
        elseif ($posi == "Nhân viên") 
        {
            $role = 2;
        }
        
        DB::transaction(function() use($sdt, $posi, $role) 
        {
            DB::table("login")->where("phone", $sdt)->update(["role" => $role]);
            DB::table("admin")->where("phone", $sdt)->update(["position" => $posi]);
        });

        return redirect()->route('account.main')->with('status', 'CẤP QUYỀN THÀNH CÔNG!');
    }

function delstaff($sdt)
    {
        DB::transaction(function() use($sdt) 
        {
            DB::table("login")->where("phone", $sdt)->delete();
            DB::table("admin")->where("phone", $sdt)->delete();
        });
        
        return redirect()->route('account.main')->with('status', 'XÓA THÀNH CÔNG!');
    }   
}

