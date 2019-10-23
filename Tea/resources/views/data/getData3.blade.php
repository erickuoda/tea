<?php
// header("Access-Control-Allow-Origin: *");

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
            
            break;
        case '原味茶':
            $x2 += 1 * $md->ordCount ;
            
            break;
        case '調味茶':
            $x3 += 1 * $md->ordCount ;
            
            break;
        case '奶香茶':
            $x4 += 1 * $md->ordCount ;
           
            break;
        case '鮮調茶':
            $x5 += 1 * $md->ordCount ;
            
            break;
        case '拿鐵茶':
            $x6 += 1 * $md->ordCount ;
            
            break;
        case '季節限定':
            $x7 += 1 * $md->ordCount ;
            
            break;
        case '功夫系列':
            $x8 += 1 * $md->ordCount ;
            
            break;
    }
}

$data = [$x1,$x2,$x3,$x4,$x5,$x6,$x7,$x8];
echo json_encode($data);