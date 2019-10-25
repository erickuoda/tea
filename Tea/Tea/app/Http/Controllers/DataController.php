<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\tealist;
class DataController extends Controller
{
    function getTea(){
        return view("data.getTea");
    }

    function testGetTea(){
        $teaList = tealist::all();
        return view("data.testGetTea",compact('teaList'));
    }

    function getData2(Request $request){
        
        $className = $request->className;
        $firstTime =  $request->myMonth."-01";
        $secTime = date('Y-m-d',strtotime($firstTime."+1 month")); 
        $myDataList = DB::table('order_detail')
                        ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
                        ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
                        ->where('order_master.orderStatus','完成')
                        ->where('tealist.teaClass',$className)
                        ->whereBetween('orderDate',array($firstTime,$secTime))
                        ->get();

        $myTeaList = tealist::where('teaClass',$className)->get();

        return view("data.getData2",compact('myDataList','myTeaList'));
    }

    function getData(Request $request){
            

            $firstTime =  $request->myMonth."-01";
            $secTime = date('Y-m-d',strtotime($firstTime."+1 month"));      
            $myDataList = DB::table('order_detail')
                         ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
                         ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
                         ->where('order_master.orderStatus','完成')
                         ->whereBetween('orderDate',array($firstTime,$secTime))
                         ->get();
            
        return view("data.getData",compact('myDataList'));
    }

    function getData3(Request $request){
        $firstTime = $request->myMonth."-01";
        $secTime = date('Y-m-d',strtotime($firstTime."+1 month")); 

        $myDataList = DB::table('order_detail')
                         ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
                         ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
                         ->where('order_master.orderStatus','完成')
                         ->whereBetween('orderDate',array($firstTime,$secTime))
                         ->get();
        
        return view("data.getData3",compact('myDataList'));
    }

    function getData4(Request $request){
        
        $className = $request->className;
        $firstTime =  $request->myMonth."-01";
        $secTime = date('Y-m-d',strtotime($firstTime."+1 month")); 
        $myDataList = DB::table('order_detail')
                        ->leftJoin('tealist','order_detail.ordDrink','=','tealist.teaName')
                        ->leftJoin('order_master','order_detail.ordNumber','=','order_master.orderID')
                        ->where('order_master.orderStatus','完成')
                        ->where('tealist.teaClass',$className)
                        ->whereBetween('orderDate',array($firstTime,$secTime))
                        ->get();

        $myTeaList = tealist::where('teaClass',$className)->get();
        return view("data.getData4",compact('myDataList','myTeaList'));
    }
}
