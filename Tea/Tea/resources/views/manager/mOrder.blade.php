@extends("layout.manager")

@section("head")
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

@section("content")
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <img src="/image/bg1.jpg" style="width:1200px;height:200px;opacity:0.5;object-fit: cover;">     
            <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:20px;">菜單調整</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#insertModal" style="margin-left:30px;height:40px;margin-top:25px;">
            新增
            </button>

            <!-- Modal -->
            <div style="font-family: Microsoft JhengHei; font-size: 22px;" class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">新增</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="myForm" method="post">
                        @csrf
                        <div class="modal-body">
                            <span>飲料種類 : </span>
                            <select name="drinkClass">
                                <option v-for="item in drink" v-bind:value="item.class" >@{{item.class}}</option>
                            </select>
                            <br><br>

                            <span>飲料名稱 : </span>
                            <input type="text" name="drinkName">
                            <br><br>

                            <span>飲料價格 : </span>
                            <input type="number" name="drinkPrice">
                            <br><br>

                            <span>是否有熱飲 : </span>
                            <label class="radio-inline" for="sugarradios-10">
                            <input type="radio" name="drinkHot" id="sugarradios-10" value=1 checked="checked">
                            有
                            </label> 
                            <label class="radio-inline" for="sugarradios-11">
                            <input type="radio" name="drinkHot" id="sugarradios-11" value=0 >
                            無
                            </label> 

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">儲存</button>                         
                        </div>
                    </form>

                    </div>
                </div>
            </div>         
        </div>
    </div>  
</div>

<div class="container-fluid" style="background:url('/image/contentBg.jpg');">
    <div id="myTable" class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12" v-for="teaClass in drink">
                <table class="table" style="margin-top: 50px">
                    <thead>
                        <tr>
                            <th></th>
                            <th>@{{teaClass.class}}&emsp;</th>
                            <th>冰</th>
                            <th>熱</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr v-for="teaDrink in teaClass.drinks">
                            <td></td>
                            <td>@{{teaDrink.teaName}}</td>
                            <td>@{{teaDrink.teaPrice}}</td>                                
                            <td v-if="teaDrink.teaHot == 1 " class="hot"></td>
                            <td v-if="teaDrink.teaHot == 0 "><td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" v-bind:data-target="'#M2'+ teaDrink.teaName">
                                修改
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" v-bind:id="'M2'+ teaDrink.teaName" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">修改</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <span>飲料種類 : </span>
                                            <select name="drinkClass">
                                                <option v-for="item in drink" v-bind:value="item.class" >@{{item.class}}</option>
                                            </select>
                                            <br><br>

                                            <span>飲料名稱 : </span>
                                            <input type="text" name="drinkName" v-bind:value="teaDrink.teaName">
                                            <br><br>

                                            <span>飲料價格 : </span>
                                            <input type="number" name="drinkPrice" v-bind:value="teaDrink.teaPrice">
                                            <br><br>
                                            
                                            <span>是否有熱飲 : </span>
                                            <label class="radio-inline" v-bind:for="'H1'+teaDrink.teaName">
                                            <input type="radio" name="drinkHot" v-bind:id="'H1'+teaDrink.teaName" value=1 v-bind:checked="teaDrink.teaHot == 1">
                                            有
                                            </label> 
                                            <label class="radio-inline" v-bind:for="'H2'+teaDrink.teaName">
                                            <input type="radio" name="drinkHot" v-bind:id="'H2'+teaDrink.teaName" value=0 v-bind:checked="teaDrink.teaHot == 0">
                                            無
                                            </label> 
                                        </div>
                                        <div class="modal-footer">
                                            <input type="hidden" name="oldTeaName" v-bind:value="teaDrink.teaName">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                            <button type="submit" class="btn btn-primary">儲存</button>                         
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" v-bind:data-target="'#M'+teaDrink.teaName">
                                刪除
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" v-bind:id="'M'+teaDrink.teaName" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">確認</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        確定要刪除 "@{{teaDrink.teaName}}" 嗎?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                                        <form method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="teaID" v-bind:value="teaDrink.teaID">
                                        <button type="submit" class="btn btn-danger">刪除</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
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

function updateDrink(){
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
}

updateDrink();

var v = new Vue({
            el:"#myTable",
            data:{
                drink:drink,
            }
        })

var v2 = new Vue({
            el:"#myForm",
            data:{
                drink:drink,
            }
        })
</script>
@endsection