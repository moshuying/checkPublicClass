<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$classID=isset($_GET['classID'])?$_GET['classID']:"";
//查询到之前的课程ID
$SelectStuSql="SELECT * FROM `studentxk` WHERE xuankeID=".$classID;
$SelectStu=$pdo->query($SelectStuSql);
$SelectStu=$SelectStu->fetchAll();
echo json_encode($SelectStu);
?>