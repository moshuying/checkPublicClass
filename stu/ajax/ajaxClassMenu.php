<?php 
include "../connect/PDOconn.php";
include "../connect/session.php";
$checkclassSql=" SELECT title,hidden FROM lesson ";
$checkclassQuery=$pdo->query($checkclassSql);
$checkclassQuery=$checkclassQuery->fetchAll();
echo json_encode($checkclassQuery);
?>