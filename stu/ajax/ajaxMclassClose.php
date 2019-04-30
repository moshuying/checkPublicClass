<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
$MID=$_SESSION['stuID'];
$className=isset($_GET['className'])?$_GET['className']:"";
//修改所有管理员的选课值为开启
$McheckOpenSql="UPDATE `lesson` SET `hidden`='1' WHERE (`title`='$className')";
$pdo->exec($McheckOpenSql);
//写入日志记录谁关闭了选课
$info=$_SESSION['username']."成功关闭了".$className."课程";
$intoLogsSql="INSERT INTO Logs(username,ip,Info) VALUES('$MID','$ip','$info')";
$pdo->exec($intoLogsSql);
?>