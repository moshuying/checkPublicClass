<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
require "../connect/Mpower.php";

$MdeletLogsSql="DELETE FROM `Logs` where date>DATE_SUB(CURDATE(), INTERVAL 1 WEEK)";
$pdo->exec($MdeletLogsSql);
echo ((int)1);
?>