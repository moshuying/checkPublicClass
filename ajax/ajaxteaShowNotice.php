<?php
include "../connect/session.php";
require "../connect/PDOconn.php";

$returnSql="SELECT * FROM notice";
$returnInfo=$pdo->query($returnSql);
$returnInfo=$returnInfo->fetchAll();

echo json_encode($returnInfo);
?>