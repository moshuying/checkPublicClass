<?php 
require "./connect/session.php"; 
include "./connect/PDOconn.php";
$username=$_SESSION['stuID'];
$username=substr($username,0,1);
if($username=="0"||empty($_SESSION['stuID'])){ 
    //echo $stuId
}else{
    $ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
    $ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
    $insertSql="INSERT INTO `jumpPower`(`userID`,`ip`)VALUES ('".$_SESSION['stuID']."','".$ip."')";
    $pdo->exec($insertSql);
    header("refresh:2;url=http://data.twogether.cn/ChooseClass/page2/connect/logOut.php?power=3");
    echo '<script>alert("您没有权限访问!2秒后自动跳转");</script>'; 
}
?>