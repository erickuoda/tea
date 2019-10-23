<?php
session_start();

$id = $_POST['userID'];
$pwd = $_POST['userPWD'];

$db = new PDO("mysql:host=localhost;dbname=tea;prot=3306","root","");
$db ->exec("set names utf8");
$result = $db->query("select count(*) as cnt from members where cAccount = '$id' and cPassword = '$pwd'");
$row = $result->fetch(PDO::FETCH_OBJ);

// echo $row->cnt; 1 

if($row->cnt == 1){
    $result = $db->query("select * from members where cAccount = '$id' ");
    $row = $result->fetch(PDO::FETCH_OBJ);

    if(substr($row->cID,0,1) == "M"){
        $_SESSION['managerID'] = "$row->cID";
        echo "<script>alert('管理者 : 歡迎，$row->cName'); location.href = '/manager/mList';</script>";
    }
    else{
        $_SESSION["userID"] = "$row->cID";
        echo "<script>alert('登入成功 : 歡迎，$row->cName'); location.href = '/home/index';</script>";
    }
    
}

else{
    echo "<script type='text/javascript'>alert('登入失敗 : 帳號密碼錯誤'); location.href = '/home/login'</script>";
}

?>