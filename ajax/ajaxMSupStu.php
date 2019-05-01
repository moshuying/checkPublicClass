<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$page=$_GET['page'];
$limit=$_GET['limit'];
header('content-type:application/json;charset=utf8'); 
$countSql="select count(*) from studentxk";
$countQuery=$pdo->query($countSql);
$countQuery=$countQuery->fetch();
$classIDSql="SELECT * FROM studentxk limit ".(($page-1)*20).",".$limit;
$stuInfoQuery=$pdo->query($classIDSql);
$stuInfoQuery=$stuInfoQuery->fetchAll();
$return=array(
    "code"=>0,
    "msg"=>"",
    "count"=>$countQuery['count(*)'],
    "data"=>$stuInfoQuery,
);
echo json_encode($return);
?>