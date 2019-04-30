<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$className=isset($_GET['className'])?$_GET['className']:"";
$beforeIDSql="SELECT * FROM `lesson` WHERE title='$className'";
$beforeID=$pdo->query($beforeIDSql);
$beforeID=$beforeID->fetchAll();
echo json_encode((array)$beforeID);
?>