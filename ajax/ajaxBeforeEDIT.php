<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
$beforeID=$_SESSION['stuID'];
$beforeEditSql="SELECT * FROM studentxk WHERE username='$beforeID'";
$beforeEditQuery=$pdo->query($beforeEditSql);
$beforeEditQuery=$beforeEditQuery->fetch();

echo json_encode((array)$beforeEditQuery);

?>