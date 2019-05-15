<?php
include "../connect/session.php";
require "../connect/PDOconn.php";

$username=$_SESSION['username'];
$classIDSql="SELECT title FROM studentxk WHERE xingming='".$username."'";
$classIDQuery=$pdo->query($classIDSql);
$classIDQuery=$classIDQuery->fetchAll();

foreach($classIDQuery as $key => $vul){
	$returnSql="SELECT className,info,NoticeTitle FROM notice WHERE className='".$vul["title"]."'ORDER BY uptime DESC";
    $returnInfo=$pdo->query($returnSql);
    $returnInfo=$returnInfo->fetch();
    $returnJSON=array_merge((array)$returnJSON,(array)$returnInfo);
}

echo json_encode($returnJSON);
?>