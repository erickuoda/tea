<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\member;
use App\shopcar;
use App\orderMaster;
use App\orderDetail;

class PageController extends Controller
{
    function index(){
        session_start();
        $emp = "";
        if(isset($_SESSION['userID'])){
            $emp = member::find($_SESSION['userID']);
        }
        return view("page.index" ,compact('emp'));
    }

    function news(){
        session_start();
        $emp = "";
        if(isset($_SESSION['userID'])){
            $emp = member::find($_SESSION['userID']);
        }
        return view("page.news" ,compact('emp'));
    }

    function login(){
        return view("page.login");
    }

    function loginPost(){
        return view("data.checkLogin");
    }

    function logout(){
        session_start();
        unset($_SESSION['userID']);
        echo "<script>alert('登出成功 : 謝謝光臨'); location.href = '/home/index';</script>";
    }

    function order(){
        session_start();

        if(isset($_SESSION['userID'])){
            $emp = member::find($_SESSION['userID']);
            $dataID = $_SESSION['userID'];
            // $x = compact('emp','dataID');
            // var_dump($x);exit();
            return view("page.order" ,compact('emp','dataID'));
        }
        else{
            echo "<script>alert('請先登入'); location.href = '/home/login';</script>"; 
        }        
    }

    function orderPost(Request $request){
        // echo $_POST['myDrinkID'];
        // echo $request->myDrinkName;
        
        $emp = new shopcar();
        $emp->shopID = $request->myDrinkID;
        $emp->shopTea = $request->myDrinkName;
        $emp->shopPrice = $request->myDrinkPrice;
        $emp->shopCount = $request->myDrinkCount;
        $emp->shopSugar = $request->myDrinkSugar;
        $emp->shopIce = $request->myDrinkIce;
        
        $emp->save();
        echo "<script>alert('成功加入我的飲料清單'); location.href = '/home/order';</script>";
    }

    function shop(){
        session_start();

        if(isset($_SESSION['userID'])){
            $emp = member::find($_SESSION['userID']);
            $dataID = $_SESSION['userID'];

            $shopList = shopcar::where('shopID',$dataID)->get();
            $tot = 0 ; 
            
            // $x = compact('emp','dataID');
            // var_dump($x);exit();
            return view("page.shop" ,compact('emp','dataID','shopList','tot'));
        }
        else{
            echo "<script>alert('請先登入'); location.href = '/home/login';</script>"; 
        }        
    }

    function shopDelete($id){
        // echo $id;
        // echo $request->testID;exit();
        $emp = shopcar::where('shopNumber',$id)->delete();
        echo "<script>alert('刪除成功'); location.href = '/home/shop';</script>";
    }

    function shopDeleteAll(Request $request){

        $mem = $request->deleteMember;
        $emp = shopcar::where('shopID',$mem)->delete();
        echo "<script>alert('刪除成功'); location.href = '/home/shop';</script>";
    }

    function shopInsert($cid){
        $emp = shopcar::where('shopID',$cid)->get();
        $mem = member::find($cid);
        $today = date("Y-m-d");//2019-09-14
        $procToday = substr((str_replace("-","",$today)),2,6);//190914

        DB::beginTransaction();
        
        //查詢訂單編號和更新訂單編號
        $todayList = DB::table('list')->where('date', $today)->get();
        // echo($todayList),"<br>";
        // echo(count($todayList)) ; exit();

        if(count($todayList) == 0){
            DB::table('list')->insert(['date'=>$today,'ID'=>1]);
            $listStrID = $procToday."0001";
            // echo "insert OK";
        }
        else{
            $myID = $todayList[0]->ID + 1 ;
            $myday = $todayList[0]->date;
            DB::table('list')->where('date',$myday)->update(['ID'=> $myID]);
    
            // $sql = "update list set ID = $myID where date = '$myday'" ;
            // DB::update($sql);
            // echo "update OK" ;
            
            if($myID < 10){
                $listStrID = $procToday."000".$myID;
            }
            elseif($myID >= 10 && $myID <100){
                $listStrID = $procToday."00".$myID;
            }
            elseif($myID >=100){
                $listStrID = $procToday."0".$myID;
            }

            // echo $listStrID; //1909160009
        }


        //新增訂單主檔資料
            $ordM = new orderMaster();
            $ordM->orderID = $listStrID;
            $ordM->cID = $cid;
            $ordM->orderTime = $_POST['orderTime'];
            $ordM->orderPhone = $mem->cPhone;
            $ordM->orderTotPrice = $_POST['orderTot'];
            $ordM->orderDes = $_POST['orderDes'] ;
            $ordM->foodStatus = "處理中" ;
            $ordM->orderStatus = "未完成" ;

            $ordM->save();

        //新增訂單明細檔資料
            

            foreach($emp as $shop){

                $ordD = new orderDetail();
                $ordD->ordNumber = $listStrID;
                $ordD->ordDrink = $shop->shopTea;
                $ordD->ordPrice = $shop->shopPrice;
                $ordD->ordCount = $shop->shopCount;
                $ordD->ordSugar = $shop->shopSugar;
                $ordD->ordIce = $shop->shopIce;

                $ordD->save();
            }

        //刪除購物車資料
        $shopcar = shopcar::where('shopID',$cid)->delete();

        DB::commit();
        
        echo "<script>alert('收到你的訂購，請於片刻後查看你的飲料處理狀況'); location.href = '/home/check';</script>";
    }

    function check(Request $req){
        session_start();

        if(isset($_SESSION['userID'])){
            $emp = member::find($_SESSION['userID']);
            $dataID = $_SESSION['userID'];
            $myTime = '';
            $ordDetail = [];
            $ordMaster = [];
            if(isset($req->orderBtn)){
                // echo $req->orderID;
                $ordDetail = orderDetail::where('ordNumber',$req->orderID)->get();
                $ordMaster = orderMaster::where('orderID',$req->orderID)->get();
            }

            $orderList = orderMaster::where(['cID' => $dataID])->orderBy('orderTime', 'desc')->get();
            // var_dump($ordDetail); exit();
        
            return view("page.check" ,compact('emp','dataID','orderList','myTime','ordDetail','ordMaster'));
        }
        else{
            echo "<script>alert('請先登入'); location.href = '/home/login';</script>"; 
        }        
    }
}
