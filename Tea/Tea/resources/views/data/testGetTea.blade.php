<?php

$myArray = [['class' => '排行榜','drinks'=>[]],
            ['class' => '原味茶','drinks'=>[]],
            ['class' => '調味茶','drinks'=>[]],
            ['class' => '奶香茶','drinks'=>[]],
            ['class' => '鮮調茶','drinks'=>[]],
            ['class' => '拿鐵茶','drinks'=>[]],
            ['class' => '季節限定','drinks'=>[]],
            ['class' => '功夫系列','drinks'=>[]],
           ];

foreach($teaList as $list)
{
    switch($list['teaClass']){
        case '排行榜':
            array_push($myArray[0]['drinks'],$list);
            break;
        case '原味茶':
            array_push($myArray[1]['drinks'],$list);
            break;
        case '調味茶':
            array_push($myArray[2]['drinks'],$list);
            break;
        case '奶香茶':
            array_push($myArray[3]['drinks'],$list);
            break;
        case '鮮調茶':
            array_push($myArray[4]['drinks'],$list);
            break;
        case '拿鐵茶':
            array_push($myArray[5]['drinks'],$list);
            break;
        case '季節限定':
            array_push($myArray[6]['drinks'],$list);
            break;
        case '功夫系列':
            array_push($myArray[7]['drinks'],$list);
            break; 
    }
}

 
echo json_encode($myArray,JSON_UNESCAPED_UNICODE);

?>