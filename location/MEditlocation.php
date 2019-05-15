<?php
require "./connect/session.php";
include "./connect/PDOconn.php";
$MID=isset($_POST['MID'])?$_POST['MID']:"";
$Mpassword=isset($_POST['Mpassword'])?$_POST['Mpassword']:"";
$Mname=isset($_POST['Mname'])?$_POST['Mname']:"";
$beforID=$_SESSION['stuID'];
try{
    if(empty($MID)||empty($Mname)||empty($Mpassword)){
        header("Location:../admin/MEdit.php?submit=2");
    }else{
        $MinsertSql="UPDATE `manager` SET `Mname` = '$Mname', `MID`='$MID',`Mpassword`='$Mpassword' WHERE `manager`.`MID` = '$beforID' ";
        $MinsertSql=$pdo->exec($MinsertSql);
        header("Location:../login.php");
    }
}catch(PODException $e){
    echo "</br>Connect ERROR!:".$e->getMessage();
    die();
}
?>