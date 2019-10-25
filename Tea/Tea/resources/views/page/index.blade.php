@extends('layout.master')

@section('head')
<style>
        b {
            margin-left: 47%;
            margin-top: 80px;
            font-family: Microsoft JhengHei;
            font-size: 33px;
            display: block;
            color: #000;
            letter-spacing: .065em;
        }

        thead {
            font-size: 24px;
            color: #fff;
            background: #957a5f;
            padding: 5px;   
            font-family: Microsoft JhengHei;
            position: relative;
        }

        thead:before {
            position: absolute;
            top:55px;
            left:20px;
            width:calc(100% - 40px);
            height:50px;
            border:3px solid #fff;
            content:"";
        }

        tbody {
            margin-top: 10px;
            font-size: 22px;
            font-family: Microsoft JhengHei;
            color: #70675e;
            padding: 10px;

        }

        .hot {
            background-image:url("/image/icon_hot.png");
            background-repeat: no-repeat;
            background-position: center;
        }
    </style> 
@endsection
    

@section('content')
<!-- content -->
<div class="container-fluid" style="background:url('/image/contentBg.jpg');">
        <img src="/image/1.jpg" class="img-fluid" style="width: 100%">

        <!-- table -->
        <b>飲品介紹</b>
        <div id="myTable" class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12" v-for="teaClass in drink">
                    <table class="table" style="margin-top: 50px">
                        <thead>
                            <tr>
                                <th></th>
                                <th>@{{teaClass.class}}&emsp;</th>
                                <th>冰</th>
                                <th>熱</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr v-for="teaDrink in teaClass.drinks">
                                <td></td>
                                <td>@{{teaDrink.teaName}}</td>
                                <td>@{{teaDrink.teaPrice}}</td>                                
                                <td v-if="teaDrink.teaHot == 1 "class="hot"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
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
            el:"#myTable",
            data:{
                drink:drink,
            }
        })
    </script>
    
@endsection
