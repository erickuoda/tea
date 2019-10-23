<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;
use App\orderDetail;
use App\orderMaster;
use App\tealist;
use DB;


class ManagerController extends Controller
{
   function mList(Request $req){
       session_start();
       $ordDetail = [];
       $guestData = [];
       $ordMaster = [];
       if(isset($_SESSION['managerID'])){
           $emp = member::find($_SESSION['managerID']);
           $orderM = orderMaster::where('orderStatus','未完成')->get();
        //    var_dump($orderM);exit();
           $orderT = DB::table("order_master")->leftJoin('members','order_master.cID','=','members.cID')->where('orderStatus','未完成')->get();

            if(isset($req->orderBtn)){
                // echo $req->orderCID;
                // exit();
                $ordDetail = orderDetail::where('ordNumber',$req->orderID)->get();
                $guestData = member::where('cID',$req->orderCID)->get();
                $ordMaster = orderMaster::where('orderID',$req->orderID)->get();
            }
           return view("manager.mList" ,compact('emp','orderM','ordDetail','guestData','ordMaster','orderT'));
       }

       else{
        echo "<script>alert('請先登入'); location.href = '/home/login';</script>";
       }
       
   }

    function mListUpdate(Request $request,$orderID){
            // echo $request->ordF;exit();
            $orderM = orderMaster::find($orderID);
            $orderM->foodStatus = $request->ordF;
            $orderM->orderStatus = $request->ordS;
            $orderM->save();

            echo "<script>alert('修改成功'); location.href = '/manager/mList';</script>";

    }

   function logout(){
       session_start();
       unset($_SESSION['managerID']);
       echo "<script>alert('登出成功'); location.href = '/home/index';</script>";
       
   }

   function mOrder(){
       session_start();
       if(isset($_SESSION['managerID'])){
            $emp = member::find($_SESSION['managerID']);
            return view("manager.mOrder",compact('emp'));
       }
   }

   function mOrderPost(Request $request){
        // echo $request->drinkClass;
        $teaList = new tealist();
        $teaList->teaClass = $request->drinkClass;
        $teaList->teaName = $request->drinkName;
        $teaList->teaPrice = $request->drinkPrice;
        $teaList->teaHot = $request->drinkHot;

        $teaList->save();
        echo "<script>alert('新增成功'); location.href = '/manager/mOrder';</script>";
        
   }

   function mOrderUpdate(Request $request){       
        // echo $request->drinkPrice;exit();
        $teaList = tealist::where('teaName',$request->oldTeaName);
        $teaList->update(['teaClass' => $request->drinkClass]);
        $teaList->update(['teaPrice' => $request->drinkPrice]);          
        $teaList->update(['teaHot' => $request->drinkHot]);  
        $teaList->update(['teaName' => $request->drinkName]);        
        echo "<script>alert('修改成功'); location.href = '/manager/mOrder';</script>";
   }

   function mOrderDelete(Request $request){
    //    echo $request->teaID;
       $teaList = tealist::find($request->teaID);
       $teaList->delete();

       echo "<script>alert('刪除成功'); location.href = '/manager/mOrder';</script>";
   }

   function mHistory(){
        session_start();
       
        if(isset($_SESSION['managerID'])){
            $emp = member::find($_SESSION['managerID']);
        }

        // if(isset($_POST['myBtn'])){
        //     $firstTime =  $_POST['myMonth']."-01";
        //     $secTime = date('Y-m-d',strtotime($firstTime."+1 month"));
            
        //    $myData = DB::table('order_detail')
        //                  ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
        //                  ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
        //                  ->whereBetween('orderDate',array($firstTime,$secTime))
        //                  ->get();

        //     var_dump($myData);exit();
        // }
        
        return view("manager.mHistory",compact('emp'));
   }

   function mHistory2(){
    session_start();
   
    if(isset($_SESSION['managerID'])){
        $emp = member::find($_SESSION['managerID']);
    }

    // if(isset($_POST['myBtn'])){
    //     $firstTime =  $_POST['myMonth']."-01";
    //     $secTime = date('Y-m-d',strtotime($firstTime."+1 month"));
        
    //    $myData = DB::table('order_detail')
    //                  ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
    //                  ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
    //                  ->whereBetween('orderDate',array($firstTime,$secTime))
    //                  ->get();

    //     var_dump($myData);exit();
    // }
    
    return view("manager.mHistory2",compact('emp'));
}


}
