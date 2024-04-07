<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class main extends Controller
{
    //

function index()
    {
        return view('admin.index');
    }

// function login()
//     {
//         return view('admin.login');
//     }

// function checklogin(Request $request)
//     {
//         $sdt = $request->input('sdt');
//         $pass = $request->input('pass');
    
//         if ($request->has('remember')) {
//             session(['password' => $pass]);
//         }

//         //dd(session()->all());

//         // Kiểm tra xem người dùng có tồn tại trong bảng login không
//         $user = User::where('sdt', $sdt)->first();
    
//         if ($user) 
//             {
//                 if ($user->password == $pass) 
//                 {
//                     session(['username' => $user->username]);
//                     session(['role' => $user->role]);
                    
//                     if ($user->role == 1) 
//                         {
//                             return view('admin.index');
//                         } 
//                     else if ($user->role == 2)
//                         {
//                             return view('admin.index');
//                         }
//                     else 
//                         {
//                             return view('admin.user');
//                         }
//                 } 
//                 else 
//                     {
//                         return redirect()->back()->with('error', 'Sai mật khẩu!');
//                     }
//             } 

//         else 
//             {
//                 // Nếu không có người dùng, hiển thị thông báo lỗi
//                 return redirect()->back()->with('error', 'Chưa đăng ký tài khoản!');
//             }
//     }
    
    function signup()
    {
        return view('signup');
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

        return redirect()->route('account.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');
    }
}
