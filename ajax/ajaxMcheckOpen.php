<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$MID=isset($_GET['MID'])?$_GET['MID']:"";
$McheckOpenSql="SELECT MopenChoose FROM manager WHERE MID='$MID'";
$return=$pdo->query($McheckOpenSql);
$return=$return->fetch();
echo json_encode($return['MopenChoose']);
?>