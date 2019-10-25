@extends("layout.manager")

@section("head")

<meta name="csrf-token" content="{{ csrf_token() }}" />
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
    
    <div class="container" style="margin-top:0px;">
        <div class="row">
            <div class="col-6">
                <div id="legendPlaceholder"></div>
                <div id="flotcontainer"></div>
            </div>
            <div class="col-6">
                <div id="legendPlaceholder2"></div>
                <div id="flotcontainer2"></div>
            </div>
        </div>
    </div>

    
</div>

<script type="text/javascript">

   
    
    $(function () {

        $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

        var data = [
            { label: "影像合成", data: 10 },
            { label: "商品拍攝", data: 20 },
            { label: "打光技巧", data: 30 },
            { label: "實拍案例", data: 40 }
        ];

        var data2 = [];
        var thisMonth ; 

        var options = {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    tilt: 0.5,
                    label:{                        
                        radius: 3/4,
                        formatter: function (label, series) {
                            return '<div style="border:1px solid gray;font-size:8pt;text-align:center;padding:5px;color:white;">' + label + '<br/>' +   
                            Math.round(series.percent) + '%</div>';
                        },
                        background: {
                            opacity: 0.5,
                            color: '#000'
                        }
                    }
                }
                    },
            legend: {
                show: false
            }
         };

        $("#myBtn").on("click",function(){

            thisMonth = $("#myMonth").val();
            var thisData = {myMonth: thisMonth,
                            };

            $.ajax({
                url:"http://localhost:8000/data/getData",
                method:"POST",
                data:thisData,
                success:function(e){
                    data = JSON.parse(e) ;
                    console.log(data);
                    $.plot($("#flotcontainer"), data, options);
                    $("#mycol").css("display","block");
                }
            });
        })

        $("#myBtn2").on("click",function(){

            var thisData2 = {className:$("#mySel").val(),
                             myMonth:thisMonth
                            };

            $.ajax({
                url:"http://localhost:8000/data/getData2",
                method:"POST",
                data:thisData2,
                success:function(e){
                    // console.log(e);
                    data2 = JSON.parse(e);
                    console.log(data2);
                    $.plot($("#flotcontainer2"), data2, options);
                }
            })

        })

        // console.log(data);
        // $.plot($("#flotcontainer"), data, options);
    });
</script>
@endsection

@section("endfooter")
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://static.pureexample.com/js/flot/excanvas.min.js"></script>
<script src="http://static.pureexample.com/js/flot/jquery.flot.min.js"></script>
<script src="http://static.pureexample.com/js/flot/jquery.flot.pie.min.js"></script>
@endsection