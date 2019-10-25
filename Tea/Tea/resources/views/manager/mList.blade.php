@extends("layout.manager")

@section("head")
<style>
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

@section("content")
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <img src="/image/bg1.jpg" style="width:1200px;height:200px;opacity:0.5;object-fit: cover;">     
           <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:20px;">未完成訂單-{{$emp->cName}}</h1>               
        </div>
    </div>  
    <div class="container" style="padding-top:30px;">
        <table class="table" style="font-size:20px;">
            <thead>
                <tr>
                    <th>客戶名稱</th>
                    <th>下單日期</th>
                    <th>客人欲取餐時間</th>
                    <th>訂單狀態</th>
                    <th>總價格</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderT as $order)
                <?php $myTime = substr($order->orderDate,5,11); ?>
                <tr>                
                    <td>{{$order->cName}}</td>
                    <td>{{$myTime}}</td>
                    <td>{{$order->orderTime}}</td>
                    @if($order->foodStatus == "處理中")
                    <td style="color:red">{{$order->foodStatus}}</td>
                    @else
                    <td style="color:green">{{$order->foodStatus}} 可取餐</td>
                    @endif
                    <td>{{$order->orderTotPrice}}</td>    
                    <td>
                        <form method="post">
                        @csrf
                        <input type="hidden" name="orderID" value="{{$order->orderID}}">
                        <input type="hidden" name="orderCID" value="{{$order->cID}}">
                        <input type="submit" name="orderBtn" value="明細" class="btn btn-primary">
                        </form>
                    </td>  
                    <td>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter{{$order->orderID}}">
                        修改
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter{{$order->orderID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">訂單編號:{{$order->orderID}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="/manager/mList/{{$order->orderID}}">
                                        @csrf
                                        @method("put")
                                        
                                        @if($order->foodStatus == "處理中")  
                                        <?php $x = date("H:i"); $y = strtotime($x."+20min");$myTime = date("H:i",$y) ?> 
                                            <p>處理情況 : &nbsp; <input type="time" name="ordF" value="{{$myTime}}">&nbsp;可取餐</p>                                      
                                        @else
                                            <p>處理情況 : &nbsp; <input type="time" name="ordF" value="{{$order->foodStatus}}" >&nbsp;可取餐</p>
                                        @endif
                                        <p>交易情況 : &nbsp;
                                            <select name="ordS">
                                                <option value="未完成">未完成</option>
                                                <option value="完成">完成交易</option>
                                                <option value="取消">取消交易</option>
                                            </select>
                                        </p>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        <button type="submit" class="btn btn-primary">儲存</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <span style="font-weight:bold;font-size:20px;margin-right:80px;">會員姓名 : {{$guestData[0]->cName}}</span> 
        <span style="font-weight:bold;font-size:20px;">會員電話 : {{$guestData[0]->cPhone}}</span>
        <p style="font-weight:bold;font-size:20px;margin-top:10px;">{{$ordMaster[0]->orderDes}}</p>
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