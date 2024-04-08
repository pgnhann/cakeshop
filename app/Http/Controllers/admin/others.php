<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;

class others extends Controller
{

/////////////////////QUẢN LÝ KHUYẾN MÃI//////////////////

    function mainprom()
        {
            $prom = DB::select("SELECT * FROM promotion");
            return view('admin.others.mainprom',compact("prom"));
        }
    
    function formaddprom()
        {
            $latestPromotion = DB::table('promotion')->orderBy('Prm_Id', 'desc')->first();
            $nextPromotionNumber = $latestPromotion ? intval(substr($latestPromotion->Prm_Id, 2)) + 1 : 1;
            $nextPromotionID = "KM" . str_pad($nextPromotionNumber, 2, "0", STR_PAD_LEFT);

            return view('admin.others.addprom', compact("nextPromotionID"));
        }
    
    function addprom(Request $request)
        {
            $id = $request->input('idprom');
            $name = $request->input('nameprom');
            $descr = $request->input('descrprom');
            $condition = $request->input('requireprom');
            $start = $request->input('datestart');
            $end = $request->input('dateend');
            $status = $request->input('statusprom');

            $data = [
                'Prm_Id' => $id,
                'Prm_Name' => $name,
                'Prm_Desc' => $descr,
                'dieukien' => $condition,
                'Prm_StDate' => $start,
                'Prm_EnDate' => $end,
                'Prm_Status' => $status,
            ];
    
            DB::table("promotion")->insert($data);
    
            return redirect()->route('promotion.main')->with('status', 'THÊM KHUYẾN MÃI THÀNH CÔNG!');   
        }

    function formupdateprom($id)
        {
            $prom = DB::table('promotion')
            ->where('Prm_Id', $id)
            ->first();
            return view('admin.others.updateprom', compact('prom'));
        }
    
    function updateprom(Request $request)
        {
            $id = $request->input('idprom');
            $name = $request->input('nameprom');
            $descr = $request->input('descrprom');
            $condition = $request->input('requireprom');
            $start = $request->input('datestart');
            $end = $request->input('dateend');
            $status = $request->input('statusprom');
            
            $data = [
                'Prm_Id' => $id,
                'Prm_Name' => $name,
                'Prm_Desc' => $descr,
                'dieukien' => $condition,
                'Prm_StDate' => $start,
                'Prm_EnDate' => $end,
                'Prm_Status' => $status,
            ];
    
            DB::table("promotion")->where("Prm_Id", $data["Prm_Id"])->update($data);
    
            return redirect()->route('promotion.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');   
        }
    
    
    function delprom($id)
        {
            DB::table("promotion")->where("Prm_Id", $id)->delete();

            return redirect()->route('promotion.main')->with('status', 'XÓA THÀNH CÔNG!');   
        }

///////////////////////QUẢN LÝ BLOG//////////////////
        
    function mainblog()
        {
            $blog = DB::select("SELECT * FROM blog");
            return view('admin.others.mainblog',compact("blog"));
        }
    
    function formaddblog()
        {
            $latestBlog = DB::table('blog')->max('stt');
            $nextBlogID = $latestBlog ? $latestBlog + 1 : 1;

            return view('admin.others.addblog', compact("nextBlogID"));
        }
    
    function addblog(Request $request)
        {
            $id = $request->input('idblog');
            $name = $request->input('nameblog');
            $descr = $request->input('descrblog');

            $data = [
                'stt' => $id,
                'tieude' => $name,
                'noidung' => $descr,
            ];
    
            DB::table("blog")->insert($data);
    
            return redirect()->route('blog.main')->with('status', 'THÊM BLOG THÀNH CÔNG!');   

        }

    function formupdateblog($id)
        {
            $blog = DB::table('blog')
                        ->where('stt', $id)
                        ->first();
            return view('admin.others.updateblog', compact('blog'));
        }
    
    function updateblog(Request $request)
        {
            $id = $request->input('idblog');
            $name = $request->input('nameblog');
            $descr = $request->input('descrblog');
            
            $data = [
                'stt' => $id,
                'tieude' => $name,
                'noidung' => $descr,
            ];
    
            DB::table("blog")->where("stt", $data["stt"])->update($data);
    
            return redirect()->route('blog.main')->with('status', 'CẬP NHẬT THÀNH CÔNG!');   
        }
    
    function delblog($id)
        {
            DB::table("blog")->where("stt", $id)->delete();

            return redirect()->route('blog.main')->with('status', 'XÓA THÀNH CÔNG!');   
        }
}