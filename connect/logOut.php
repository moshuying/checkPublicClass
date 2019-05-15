<?php
include './PDOconn.php';
include './session.php';
// 下线时写入日志
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
$username=$_SESSION['stuID'];
$info=$_SESSION['username']."已下线";
$sql_logs = "INSERT INTO Logs(username,ip,Info) VALUES('$username','$ip','$info')";
$pdo -> exec($sql_logs);
usleep(10);//等待exec函数执行完毕
//删除所有Session的变量，也可以用unset($_SESSION[XXX])逐个删除
$_SESSION = array(); 
//将原来注册的某个变量销毁
unset($_SESSION['username']);
unset($_SESSION['stuID']);
//关闭连接
$pdo=null;
session_destroy();
$power=isset($_GET['power'])?$_GET['power']:"";
header("Location:../../?err=" . $power);

?>