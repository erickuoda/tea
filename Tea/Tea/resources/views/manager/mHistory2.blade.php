@extends("layout.manager")

@section("head")

<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<style>
    #flotcontainer {
        width: 500px;
        height: 400px;
    }

    #flotcontainer2 {
        width: 500px;
        height: 400px;
    }
</style>


@endsection

@section("content")
<div class="container-field" style="background:url('/image/contentBg.jpg');margin-top:85px;">
    <div class="container">
        <div class="row">
            <img src="/image/bg1.jpg" style="width:1200px;height:200px;opacity:0.5;object-fit: cover;">     
           <h1 class="text-center font-weight-bold" style="font-family:Microsoft JhengHei;margin-top:20px;">歷史訂單分析-{{$emp->cName}}</h1>               
        </div>
    </div>

    <div class="container" Style="margin-top:30px;font-family:Microsoft JhengHei;font-size:20px;">
        <div class="row">
            <div class="col-6">
                <span>選擇月份 : </span>
                <input id="myMonth" type="month" name="myMonth" >&nbsp;&nbsp;
                <button id="myBtn" class="btn btn-info" name="myBtn">查詢</button>
            </div>

            <div class="col-6" style="display:none" id="mycol"> 
                <span>查看詳細 : </span>
                <select id="mySel">
                    <option>排行榜</option>
                    <option>原味茶</option>
                    <option>調味茶</option>
                    <option>奶香茶</option>
                    <option>鮮調茶</option>
                    <option>拿鐵茶</option>
                    <option>季節限定</option>
                    <option>功夫系列</option>
                </select>&nbsp;&nbsp;
                <button id="myBtn2" class="btn btn-info">查詢</button>
            </div>
        </div>       
    </div>
    
    <div class="container" style="margin-top:10px;">
        <div class="row">
            <div class="col-6">
                <canvas id="chartCanvas1"></canvas>
            </div>
            <div class="col-6">
                <canvas id="chartCanvas2"></canvas>
            </div>
        </div>
    </div>

    
</div>

<script type="text/javascript">

   
    
    $(function () {

        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

        

        var thisMonth ; 

        
        $("#myBtn").on("click",function(){

            thisMonth = $("#myMonth").val();
            var thisData = {myMonth: thisMonth,
                            };
                            
            $.ajax({
                url:"http://localhost:8000/data/getData3",
                method:"POST",
                data:thisData,
                success:function(e){
                    var data2 = JSON.parse(e);
                    var ctx = document.getElementById("chartCanvas1");
                    var cityPopulationList = [ 1000,0,1000,1000,1000,1000,1000,1000,];
                    var cityNameList = [ "排行榜", "原味茶", "調味茶", "奶香茶", "鮮調茶","拿鐵茶","季節限定","功夫系列"];
                    var pieChart = new Chart(ctx, {
                        type: "doughnut",
                        data: {
                            labels: cityNameList,
                            datasets: [
                                {
                                    data: data2,
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#ffad33","#ecb3ff","#ffffff"]
                                }
                            ]
                        },
                        options: {
                            title: {
                                display: true,
                                text: ''
                            }
                        }
                    });

                    $("#mycol").css("display","block");
                }
            })
        })

        $("#myBtn2").on("click",function(){

            var thisData2 = {className:$("#mySel").val(),
                             myMonth:thisMonth
                            };
                            
            $.ajax({
                url:"http://localhost:8000/data/getData4",
                method:"POST",
                data:thisData2,
                success:function(e){
                    var data3 = JSON.parse(e);
                    var cityPopulationList = data3[1];
                    var cityNameList = data3[0];
                    var ctx = document.getElementById("chartCanvas2");
                    // console.log(data3);
            
                    var pieChart = new Chart(ctx, {
                        type: "bar",
                        data: {
                            labels: cityNameList,
                            datasets: [
                                {   
                                    label: "飲料數量",
                                    data: cityPopulationList,
                                    // backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#ffad33","#ecb3ff","#ffffff"]
                                    backgroundColor: "rgba(14,72,100,0.2)",
                                    borderColor: "rgba(14,72,100,1.0)",
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            title: {
                                display: true,
                                text: ''
                            }
                        }
                    });

                }
            })

            
        })

        
    });
</script>
@endsection

@section("endfooter")
@endsection