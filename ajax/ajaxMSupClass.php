<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$page=$_GET['page'];
$limit=$_GET['limit'];
header('content-type:application/json;charset=utf8'); 
$countSql="select count(*) from lesson";
$countQuery=$pdo->query($countSql);
$countQuery=$countQuery->fetch();
$classIDSql="SELECT * FROM lesson limit ".$page.",".$limit;
$classIDQuery=$pdo->query($classIDSql);
$classIDQuery=$classIDQuery->fetchAll();
$return=array(
    "code"=>0,
    "msg"=>"",
    "count"=>$countQuery['count(*)'],
    "data"=>$classIDQuery,
);
echo json_encode($return);
?>