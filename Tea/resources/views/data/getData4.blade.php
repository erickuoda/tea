<?php

$myClass = [];
$myCnt = [];

foreach($myTeaList as $md){
    array_push($myClass,$md['teaName']);   
}

foreach($myClass as $mc){
    array_push($myCnt,0);
}

foreach($myDataList as $md2){   
    foreach($myClass as $ind => $val){
        if($md2->ordDrink == $val){
            $myCnt[$ind] += 1*$md2->ordCount;
        }
    }
}

$myData = [];
array_push($myData,$myClass);
array_push($myData,$myCnt);

echo json_encode($myData,JSON_UNESCAPED_UNICODE);

?>