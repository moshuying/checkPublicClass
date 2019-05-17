<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
header("Content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$stuID=$_GET['stuID'];
$ID=$_GET['ID'];
$delSql='DELETE FROM `lesson`.`studentxk` WHERE `username` = '.$stuID.' AND `xuankeID` ='.$ID;
$pdo->exec($delSql);
return json_encode(1)
?>