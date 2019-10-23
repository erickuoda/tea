<?php
// header("Access-Control-Allow-Origin: *");
$x0 = 0;
$x1 = 0;
$x2 = 0;
$x3 = 0;
$x4 = 0;
$x5 = 0;
$x6 = 0;
$x7 = 0;
$x8 = 0;

foreach($myDataList as $md){
    switch($md->teaClass){
        case '排行榜':
            $x1 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '原味茶':
            $x2 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '調味茶':
            $x3 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '奶香茶':
            $x4 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '鮮調茶':
            $x5 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '拿鐵茶':
            $x6 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '季節限定':
            $x7 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
        case '功夫系列':
            $x8 += 1 * $md->ordCount ;
            $x0 += 1 * $md->ordCount ;
            break;
    }
}

$myData = [["label" => "排行榜","data" =>($x1/$x0)*100],
           ["label" => "原味茶","data" =>($x2/$x0)*100],
           ["label" => "調味茶","data" =>($x3/$x0)*100],
           ["label" => "奶香茶","data" =>($x4/$x0)*100],
           ["label" => "鮮調茶","data" =>($x5/$x0)*100],
           ["label" => "拿鐵茶","data" =>($x6/$x0)*100],
           ["label" => "季節限定","data" =>($x7/$x0)*100],
           ["label" => "功夫系列","data" =>($x8/$x0)*100],
];



echo json_encode($myData,JSON_UNESCAPED_UNICODE);



?>
