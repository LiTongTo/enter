<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavModel;

class IndexController extends Controller
{
     public function index(){

	return view('admin/index');
	 }

     public function navAdd(){

         return view('admin/nav/navAdd');
     }

     public function addDo(){
         $data=request()->all();
         $data['creatime']=time();
         $Nmodel=new NavModel();

         $Info=$Nmodel->insert($data);
         //print_r($Info);
         if($Info){
             $message=[
                 "code"=>"00000",
                 "message"=>"添加成功",
                 "result"=>[]
             ];
         }else{
             $message=[
                 "code"=>"00001",
                 "message"=>"系统错误",
                 "result"=>[]
             ];
         }
         
        return json_encode($message,JSON_UNESCAPED_UNICODE);
     }
}
