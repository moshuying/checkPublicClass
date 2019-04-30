<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
require "../connect/Mpower.php";
$MdeletLogsSql="SELECT * FROM `Logs` where date>DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";//SELECT * FROM `Logs` where date >= now()-interval 1 minute; 
$retun=$pdo->query($MdeletLogsSql);
echo ($retun);
?>