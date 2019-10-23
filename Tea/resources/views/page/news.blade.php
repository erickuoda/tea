@extends('layout.master')

@section('head')
@endsection

@section('content')
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:100px;">新品推薦</h1>
            </div>
            <div class="col-3">
                <img src="/image/content_top_icon.jpg" style="height:200px;width:200px;">
            </div>       
        </div>
    </div>  

    <div class="container-field" style="background:url('/image/newsBg.jpg');height:450px;margin-top:30px;">   
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="/image/3.jpg" class="myJQ img-thumbnail" style="max-width:358px;height:358px;margin-top:45px;">
                </div>
                <div class="col-9">
                    <a href="https://www.w3schools.com" style="color:#87623e;font-size:30px;font-family:Microsoft JhengHei;margin-top:100px;margin-left:30%;display:block">【御賜聖果】御選桑葚</a>
                    <br>
                    <p style="font-family:Microsoft JhengHei;margin-top:20px;margin-left:30%;">桑葚凍飲茶優惠$45，只在9/21-10/6出沒！
                    <br><br>
                    與故宮聯名的最終尾聲
                    <br>今，獻上進貢帝王之聖品<br>
                    古代唯有一人得以享用<br>
                    而你是唯一值得品嚐的那一個～
                    </p>
                    <button id="goBtn" class="btn btn-danger" style="font-family:Microsoft JhengHei;margin-top:0px;margin-left:30%;">馬上訂購</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:50px;">
        <p style="font-family:Microsoft JhengHei;margin-top:20px;margin-left:45%;font-size: 33px;">最新消息</p>
        <div class="row" >
            <div class="col-4" style="margin-top:50px;">
                <img src="/image/3.jpg" class="img-thumbnail myJQ" style="height:328px">
                <br>
                <p style="font-size:21px;color:#545454;font-family:Microsoft JhengHei;margin-top:10px">【御賜聖果】御選桑葚 <p>
            </div>
            <div class="col-4" style="margin-top:50px;">
                <img src="/image/4.jpg" class="img-thumbnail myJQ" style="height:328px">
                <br>
                <p style="font-size:21px;color:#545454;font-family:Microsoft JhengHei;margin-top:10px">TP餅在更多門店登場了！ <p>
            </div>
            <div class="col-4" style="margin-top:50px;">
                <img src="/image/5.jpg" class="img-thumbnail myJQ" style="height:328px">
                <br>
                <p style="font-size:21px;color:#545454;font-family:Microsoft JhengHei;margin-top:10px">【芋見奇亞籽百貨新上市】 <p>
            </div>
            <div class="col-4" style="margin-top:50px;">
                <img src="/image/6.jpg" class="img-thumbnail myJQ" style="height:328px">
                <br>
                <p style="font-size:21px;color:#545454;font-family:Microsoft JhengHei;margin-top:10px">中秋團圓【買四送一】 <p>
            </div>
        </div>
    </div>
</div>

<script>
    $(".myJQ").mouseenter(function(){
        $(this).removeClass("img-thumbnail");
    })

    $(".myJQ").mouseleave(function(){
        $(this).addClass("img-thumbnail");
    })

    $("#goBtn").on("click",function(){
        location.href = "http://localhost:8000/home/order"
    })
</script>
@endsection