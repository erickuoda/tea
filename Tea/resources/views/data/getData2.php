<?php

$myData = [];

foreach($myTeaList as $md){
    array_push($myData,['label' => $md['teaName'],"data" => 0]);   
}

foreach($myDataList as $md2){   
   foreach($myData as $ind => $val){
       if($md2->ordDrink == $val['label']){
            $myData[$ind]['data'] += 1*$md2->ordCount ;
       }
   }
}


$cnt = 0;    
foreach($myData as $val){
    $cnt += $val['data'];
}

foreach($myData as $ind => $val){
    $myData[$ind]['data'] = ($val['data']/$cnt)*100;
}


echo json_encode($myData,JSON_UNESCAPED_UNICODE);

// $myData = [["label" => "排行榜","data" =>($x1/$x0)*100],
//            ["label" => "原味茶","data" =>($x2/$x0)*100],
//            ["label" => "調味茶","data" =>($x3/$x0)*100],
//            ["label" => "奶香茶","data" =>($x4/$x0)*100],
//            ["label" => "鮮調茶","data" =>($x5/$x0)*100],
//            ["label" => "拿鐵茶","data" =>($x6/$x0)*100],
//            ["label" => "季節限定","data" =>($x7/$x0)*100],
//            ["label" => "功夫系列","data" =>($x8/$x0)*100],
// ];


?>