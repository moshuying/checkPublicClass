<?php
include "../connect/session.php";
require "../connect/PDOconn.php";

$username=$_SESSION['username'];
$classIDSql="SELECT * FROM lesson WHERE author='".$username."'";
$classIDQuery=$pdo->query($classIDSql);
$classIDQuery=$classIDQuery->fetchAll();

echo json_encode($classIDQuery);
?>