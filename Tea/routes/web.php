<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//customer
Route::get("/", "PageController@index");
Route::get("/home/index","PageController@index");

Route::get("/home/news","PageController@news");

Route::get("/home/login","PageController@login");
Route::post("/home/login","PageController@loginPost");
Route::get("/home/logout","PageController@logout");

Route::get("/home/order","PageController@order");
Route::post("/home/order","PageController@orderPost");

Route::get("/home/shop","PageController@shop");
Route::delete("/home/shop/{id}","PageController@shopDelete");
Route::delete("/home/shop","PageController@shopDeleteAll");
Route::post("/home/shop/{cid}","PageController@shopInsert");

Route::get("/home/check","PageController@check");
Route::post("/home/check","PageController@check");

//manager
Route::get("/manager/mList","ManagerController@mList");
Route::post("/manager/mList","ManagerController@mList");
Route::put("/manager/mList/{orderID}","ManagerController@mListUpdate");

Route::get("/manager/mOrder","ManagerController@mOrder");
Route::post("/manager/mOrder","ManagerController@mOrderPost");
Route::put("/manager/mOrder","ManagerController@mOrderUpdate");
Route::delete("/manager/mOrder","ManagerController@mOrderDelete");

Route::get("/manager/mHistory","ManagerController@mHistory");
Route::post("/manager/mHistory","ManagerController@mHistory");

Route::get('/manager/mHistory2',"ManagerController@mHistory2");
Route::get("/manager/logout","ManagerController@logout");


//data
Route::get("/data/getTea","DataController@getTea");
Route::get("/data/testGetTea","DataController@testGetTea");
Route::get("/data/getData","DataController@getData");
Route::get("/data/getData2","DataController@getData2");

Route::post("/data/getData3","DataController@getData3");
Route::post("/data/getData4","DataController@getData4");



