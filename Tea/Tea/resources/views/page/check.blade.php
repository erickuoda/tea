@extends('layout.master')

@section('head')
<Style>
    .container{
        font-family:Microsoft JhengHei;
    }

    @media only screen and (max-width: 800px) {
        .mumi{
            display:none;
        }
    }

</style>
@endsection

@section('content')

<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:100px;">飲料訂單</h1>
            </div>
            <div class="col-3">
                <img src="/image/content_top_icon.jpg" style="height:200px;width:200px;">
            </div>       
        </div>
    </div>  

    <div class="container" style="padding-top:50px;">
        <table class="table" style="font-size:20px;">
            <thead>
                <tr>
                    <th>下單日期</th>
                    <th>訂單狀態</th>
                    <th>交易狀態</th>
                    <th>欲取餐時間</th>
                    <th>總價格</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderList as $order)
                <?php $myTime = substr($order->orderDate,5,11); ?>
                <tr>             
                    <td>{{$myTime}}</td>   
                    @if($order->foodStatus == "處理中")
                    <td style="color:red">{{$order->foodStatus}}</td>
                    @else
                    <td style="color:green">{{$order->foodStatus}} 可取餐</td>
                    @endif
                    <td>{{$order->orderStatus}}</td>
                    <td>{{$order->orderTime}}</td>
                    <td>{{$order->orderTotPrice}}</td>
                    
                    
                    <td>
                        <form method="post">
                        @csrf
                        <input type="hidden" name="orderID" value="{{$order->orderID}}">
                        <input type="submit" name="orderBtn" value="明細" class="btn btn-primary">
                        </form>
                    </td>                  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if(empty($ordDetail) === false)
    <!-- {{$ordDetail}} -->
    <div class="container">
        <p class="mt-5 " style="font-weight:bold;font-size:26px;">訂單編號 : {{$ordDetail[0]->ordNumber}} </p>
        <p style="font-size:20px;">{{$ordMaster[0]->orderDes}} </p>
        <table class="table" style="font-size:20px;">
            <thead>
                <tr>
                    <th>飲料</th>
                    <th>價錢</th>
                    <th>數量</th>
                    <th>甜度</th>
                    <th>冰塊</th>
                    <!-- <th>冷熱</th>                               -->
                </tr>
            </thead>
            <tbody>
                @foreach($ordDetail as $ord)
                <tr>
                    <td>{{$ord->ordDrink}}</td>
                    <td>{{$ord->ordPrice}}</td>
                    <td>{{$ord->ordCount}}</td>
                    <td>{{$ord->ordSugar}}</td>
                    <td>{{$ord->ordIce}}</td>
                    <!-- <td>{{$ord->ordHot}}</td> -->
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>
    @endif

    

    &nbsp;
</div>


@endsection