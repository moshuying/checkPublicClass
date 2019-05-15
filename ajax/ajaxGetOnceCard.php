<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$titleID=$_GET['classID'];
header('content-type:application/json;charset=utf8'); 
$requestSQL="SELECT * FROM lesson WHERE ID=".$titleID;
$request=$pdo->query($requestSQL);
$request->fetch();
echo json_encode($request);
?>