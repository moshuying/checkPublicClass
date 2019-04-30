<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
$MID=isset($_GET['MID'])?$_GET['MID']:"";
//修改所有管理员的选课值为开启
$McheckOpenSql="UPDATE `manager` SET `MopenChoose` = '1'";//WHERE `manager`.`MID` = '$MID'
$pdo->exec($McheckOpenSql);
//写入日志记录谁开启了选课
$info=$_SESSION['username']."成功开启选课";
$intoLogsSql="INSERT INTO Logs(username,ip,Info) VALUES('$MID','$ip','$info')";
$pdo->exec($intoLogsSql);
echo json_encode('1');
?>