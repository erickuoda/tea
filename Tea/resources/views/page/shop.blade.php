@extends("layout.master")

@section('head')
<Style>
    .container{
        font-family:Microsoft JhengHei;
    }

    @media only screen and (max-width: 576px) {
            #myBr{
                display: block !important;
            }
        }

</style>
@endsection

@section('content')
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">

    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:100px;">飲料清單</h1>
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
                    <th>飲料</th>
                    <th>數量</th>
                    <th>甜度</th>
                    <th>冰塊</th>
                    <th>價錢</th>
                    <!-- <th>冷熱</th> -->
                    <th>小計</th>
                    <th><th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($shopList as $shop)
                <?php 
                $tot += ($shop->shopPrice * $shop->shopCount);
                ?>

                <tr>
                    <td>{{$shop->shopTea}}</td>             
                    <td>{{$shop->shopCount}}</td>
                    <td>{{$shop->shopSugar}}</td>
                    <td>{{$shop->shopIce}}</td>
                    <!-- <td>{{$shop->shopHot}}</td> -->
                    <td>{{$shop->shopPrice}}</td>
                    <td>{{$shop->shopPrice * $shop->shopCount}}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#checkDelete">
                        刪除
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="checkDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">確認</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" Style="font-size:18px;">
                            確定要刪除嗎?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                <form method="post" action="/home/shop/{{$shop->shopNumber}}">
                                    @csrf
                                    @method("delete")
                                    <!-- <input type="hidden" name="testID" value="test123"> -->
                                    <input type="submit" value="刪除" class="btn btn-danger">
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

        <h3 Style="margin-left:61%;">總計 : {{$tot}} 元</h3>

        
        

    </div>
    &nbsp;

    <div class="container">

        <form method="post" action="/home/shop/{{$dataID}}">
        @csrf
        <?php $x = date("H:i"); $y = strtotime($x."+20min");$myTime = date("H:i",$y) ?>
        <div class="row">
            <div class="col-12 col-sm-3">欲取餐時間 : <input type="time" value="{{$myTime}}" name="orderTime"></div>
            <div id="myBr" style="display:none">&nbsp;<br></div>
            <div class="col-12 col-sm-9"><textarea cols="50" rows="4" name="orderDes">備註 : 您的聯絡方式 : {{$emp->cPhone}}</textarea></div>
        </div>
        
        <input type="hidden" value="{{$tot}}" name="orderTot">

        <div class="container d-flex justify-content-end">
            <!-- Button trigger modal -->
            <input type="button" value="送出" class="btn btn-primary "data-toggle="modal" data-target="#exampleModalCenter">&nbsp;
           
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">確認</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" Style="font-size:18px;">
                    確定要訂購嗎?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">訂購</button>
                </div>
                </div>
            </div>
            </div>
        </form>

            <form method="post">
            @csrf
            @method("delete")
            <input type="hidden" name="deleteMember" value="{{$dataID}}">
            <button type="submit" class="btn btn-danger">清空</button>
            </form>
        </div>
        
    </div>
</div>

@endsection