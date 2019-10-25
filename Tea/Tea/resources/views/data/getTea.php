<?php

$db = new PDO("mysql:host=localhost;dbname=tea;prot=3306","root","");
$db ->exec("set names utf8");
$result = $db->query("select * from teaList");
$obj = "[";
while($row = $result->fetch(PDO::FETCH_OBJ)){
    $obj = $obj . json_encode($row) . ",";
}

$db = null ;

    echo substr($obj,0,strlen($obj)-1)."]";
    
    
?>