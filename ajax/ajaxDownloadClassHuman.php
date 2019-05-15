<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$className=isset($_GET['className'])?$_GET['className']:"";
$beforeIDSql="SELECT ID,author,number FROM `lesson` WHERE title='$className'";
$beforeID=$pdo->query($beforeIDSql);
$beforeID=$beforeID->fetch();
//查询到之前的课程ID
$SelectStuSql="SELECT username,xingming,zhuanye,banji FROM `studentxk` WHERE xuankeID=".$beforeID['ID'];
$SelectStu=$pdo->query($SelectStuSql);
$SelectStu=$SelectStu->fetchAll();

$SelectStu->author=$beforeID['author'];
$SelectStu->number=$beforeID['number'];
echo json_encode($SelectStu);
?>