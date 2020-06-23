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

     public function navShow(){
        $Nmodel=new NavModel();
        $Info=$Nmodel->where("is_del",1)->orderby("sorts","desc")->paginate(2);
        return view('admin/nav/navShow',["Info"=>$Info]);
     }

     public function del(){
          $id=request()->all();
          $Nmodel=new NavModel();
          $Info=$Nmodel->where("id",$id)->update(["is_del"=>2]);
          //dd($Info);
           if($Info){
               $message=[
                   "code"=>"00000",
                   "message"=>"删除成功",
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

      public function update($id){
          //$id=request()->all();
          $Nmodel=new NavModel();
          $Info=$Nmodel->where("id",$id)->first();
          //dd($Info);
          return view('admin/nav/update',["Info"=>$Info]);
      }

      public function upDo(){
           $data=request()->all();
           //dd($data);
         $res=NavModel::where('id',$data["id"])->update($data);
         // dd($res);
          if($res==1){
              $message=[
                  "code"=>"00000",
                  "message"=>"修改成功",
                  "result"=>[]
              ];
          }else if($res==1){
               $message=[
                   "code"=>"00001",
                   "message"=>"未做修改",
                   "result"=>[]
               ];
          }else{
              $message=[
                  "code"=>"00002",
                  "message"=>"系统错误",
                  "result"=>[]
              ];
          }

          return json_encode($message,JSON_UNESCAPED_UNICODE);
      }
}
