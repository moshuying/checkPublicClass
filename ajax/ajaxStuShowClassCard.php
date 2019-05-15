<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$username=$_SESSION['username'];
$classIDSql="SELECT xuankeID FROM studentxk WHERE xingming='".$username."'";
$classIDQuery=$pdo->query($classIDSql);
$classIDQuery=$classIDQuery->fetchAll();
foreach($classIDQuery as $key => $vul){
    $returnSql="SELECT * FROM lesson WHERE ID='".$vul["xuankeID"]."'";
    $returnInfo=$pdo->query($returnSql);
    $returnInfo=$returnInfo->fetchAll();
    $returnJSON=array_merge((array)$returnJSON,(array)$returnInfo);
}
echo json_encode($returnJSON);
?>