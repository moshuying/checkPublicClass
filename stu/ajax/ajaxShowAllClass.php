<?php
include "../connect/session.php";
require "../connect/PDOconn.php";

$classIDSql="SELECT * FROM lesson";
$classIDQuery=$pdo->query($classIDSql);
$classIDQuery=$classIDQuery->fetchAll();

echo json_encode((array)$classIDQuery);
?>