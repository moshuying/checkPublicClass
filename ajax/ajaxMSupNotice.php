<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$page=$_GET['page'];
$limit=$_GET['limit'];
header('content-type:application/json;charset=utf8'); 
$countSql="select count(*) from notice";
$countQuery=$pdo->query($countSql);
$countQuery=$countQuery->fetch();
$noticeInfoSql="SELECT * FROM notice limit ".(($page-1)*20).",".$limit;
$noticeInfoQuery=$pdo->query($noticeInfoSql);
$noticeInfoQuery=$noticeInfoQuery->fetchAll();
$return=array(
    "code"=>0,
    "msg"=>"",
    "count"=>$countQuery['count(*)'],
    "data"=>$noticeInfoQuery,
);
echo json_encode($return);
?>