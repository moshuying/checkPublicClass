<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$SelectStuSql="SELECT username,xingming,zhuanye,banji FROM `studentxk` WHERE xuankeID=5";
$SelectStu=$pdo->query($SelectStuSql);
$SelectStu=$SelectStu->fetchAll();
echo json_encode($SelectStu);
?>