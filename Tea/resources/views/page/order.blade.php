@extends('layout.master')

@section('head')
@endsection

@section('content')
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:100px;">線上訂飲料</h1>
            </div>
            <div class="col-3">
                <img src="/image/content_top_icon.jpg" style="height:200px;width:200px;">
            </div>       
        </div>
    </div>  
    
    <!-- form start -->

    <div class="container" id="app" >
        <form method="post" class="font-weight-bold" style="font-family:Microsoft JhengHei;font-size:18px;">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-md-2 col-3 col-form-label ">飲料種類 :</label>
                <div class="col-md-6 col-5">
                    <select id="dkClass" class="form-control" v-model="drinkClass">
                        <option v-for="item in drink" v-bind:value="item">@{{item.class}}</option>
                    </select>
                </div>
            </div>
            <!-- @{{drinkClass}} -->

            <div class="form-group row">
                <label for="inputPassword3" class="col-md-2 col-3 col-form-label">飲料 :</label>
                <div class="col-md-6 col-5">
                    <select id="dkName" class="form-control" v-model="drinkName">
                        <option v-for="item in drinkClass.drinks" v-bind:value="item">@{{item.teaName}} -- @{{item.teaPrice}}元</option>
                    </select>
                    <input type="hidden" v-bind:value="drinkName.teaName" name="myDrinkName" id="myDrinkName">
                    <input type="hidden" v-bind:value="drinkName.teaPrice" name="myDrinkPrice" id="myDrinkPrice">
                </div>
            </div>
            <!-- @{{drinkName}} -->

            <!-- <div class="form-group row">
                <label class="col-md-2 col-3 control-label" for="hotradios">冷或熱飲 :</label>
                <div class="col-md-6 col-5"> 
                    <label class="radio-inline" for="hotradios-0">
                    <input type="radio" name="myDrinkHot" id="hotradios-0" value="冷" checked="checked">
                    冷
                    </label> 
                    <label class="radio-inline" for="hotradios-1" v-if="drinkName.teaHot == 1">
                    <input type="radio" name="myDrinkHot" id="hotradios-1" value="熱">
                    熱
                    </label>
                </div>
            </div> -->
            <input type="hidden" value="熱" name="myDrinkHot">

            <div class="form-group row">
                <label for="inputPassword3" class="col-md-2 col-3 col-form-label">數量 :</label>
                <div class="col-md-2 col-2">
                    <input type="number" min="1" class="form-control" name="myDrinkCount" id="myDrinkCount" placeholder="0" v-model="myCount">
                </div>
            </div>

            <div class="form-group row">
            <label class="col-md-2 col-3 control-label" for="sugarradios">甜度 :</label>
            <div class="col-md-6 col-5"> 
                <label class="radio-inline" for="sugarradios-0">
                <input type="radio" name="myDrinkSugar" id="sugarradios-0" value="正常" checked="checked">
                正常
                </label> 
                <label class="radio-inline" for="sugarradios-1">
                <input type="radio" name="myDrinkSugar" id="sugarradios-1" value="八分糖">
                八分糖
                </label> 
                <label class="radio-inline" for="sugarradios-2">
                <input type="radio" name="myDrinkSugar" id="sugarradios-2" value="半糖">
                半糖
                </label> 
                <label class="radio-inline" for="sugarradios-3">
                <input type="radio" name="myTeaSugar" id="sugarradios-3" value="少糖">
                少糖
                </label> 
                <label class="radio-inline" for="sugarradios-4">
                <input type="radio" name="myDrinkSugar" id="sugarradios-4" value="無糖">
                無糖
                </label>
            </div>
            </div>

            <!-- Multiple Radios (inline) -->
            <div class="form-group row">
            <label class="col-md-2 col-3 control-label" for="iceradios">冰塊 :</label>
            <div class="col-md-6 col-5"> 
                <label class="radio-inline" for="iceradios-0">
                <input type="radio" name="myDrinkIce" id="iceradios-0" value="正常" checked="checked">
                正常
                </label> 
                <label class="radio-inline" for="iceradios-1">
                <input type="radio" name="myDrinkIce" id="iceradios-1" value="少冰">
                少冰
                </label> 
                <label class="radio-inline" for="iceradios-2">
                <input type="radio" name="myDrinkIce" id="iceradios-2" value="微冰">
                微冰
                </label> 
                <label class="radio-inline" for="iceradios-3">
                <input type="radio" name="myDrinkIce" id="iceradios-3" value="去冰">
                去冰
                </label>
                <label v-if="drinkName.teaHot == 1" class="radio-inline" for="iceradios-4">
                <input type="radio" name="myDrinkIce" id="iceradios-4" value="熱">
                熱
                </label>
            </div>
            </div>
            
            <div class="form-group row d-flex justify-content-end mt-5">
                <div class="col-md-5 col-5">
                    <input type="hidden" name="myDrinkID" value="{{$dataID}}">
                    <button type="submit" class="btn btn-primary" name="myDrinkButton">加入我的飲料</button>&nbsp;
                    <a href="/home/shop" class="btn btn-info">我的飲料</a>
                </div>
            </div>
            &nbsp;
        </form>
    </div>

</div>



<script>

    var drink = [{class:"排行榜",drinks:[]},
                 {class:"原味茶",drinks:[]},
                 {class:"調味茶",drinks:[]},
                 {class:"奶香茶",drinks:[]},
                 {class:"鮮調茶",drinks:[]},
                 {class:"拿鐵茶",drinks:[]},
                 {class:"季節限定",drinks:[]},
                 {class:"功夫系列",drinks:[]}
                ];
    $.ajax({
        url:"/data/getTea",
        type:"get",
        async: false,
        success:function(e){
            var obj = JSON.parse(e);
            // console.log(obj);
            $.each(obj,function(ind,val){
                // console.log(val);
                
                switch(val.teaClass){
                    case "排行榜":
                        drink[0].drinks.push(val);
                    break;
                    case "原味茶":
                        drink[1].drinks.push(val);
                    break;
                    case "調味茶":
                        drink[2].drinks.push(val);
                    break;
                    case "奶香茶":
                        drink[3].drinks.push(val);
                    break;
                    case "鮮調茶":
                        drink[4].drinks.push(val);
                    break;
                    case "拿鐵茶":
                        drink[5].drinks.push(val);
                    break;
                    case "季節限定":
                        drink[6].drinks.push(val);
                    break;
                    case "功夫系列":
                        drink[7].drinks.push(val);
                    break;
                    
                }
            })               
        }
    })
    console.log(drink);

    var v = new Vue({
        el:"#app",
        data:{
            drink:drink,
            drinkClass:{},
            drinkName:{},
            myHot:"冷",
            myCount:1,
        },
        mounted(){
            this.drinkClass = this.drink[0];
            // this.drinkClass = this.drink[6];
            this.drinkName = this.drink[0].drinks[0];
            // this.drinkName = this.drink[6].drinks[9];
        },
        watch:{
            drinkClass : function(){
            this.drinkName = this.drinkClass.drinks[0];
            },
            // drinkClass : function(){
            //     if(this.drinkName == this.drink[6].drinks[9]){
            //         this.drinkName = this.drink[6].drinks[9];
            //     }
            //     else{
            //         this.drinkName = this.drinkClass.drinks[0];
            //     }
            // }
        },
    })

    $("#dkName").on("change",function(){
        $("#hotradios-0").prop("checked",true);
    })

    $("#dkClass").on("change",function(){
        $("#hotradios-0").prop("checked",true);
    })


</script>    
@endsection