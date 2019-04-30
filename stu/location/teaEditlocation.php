<?php 

require "../connect/PDOconn.php";
include "../connect/session.php";

$teaName=isset($_POST['teaName'])?$_POST['teaName']:"";
$teaInfo=isset($_POST['teaInfo'])?$_POST['teaInfo']:"";
$teaPassword=isset($_POST['teaPassword'])?$_POST['teaPassword']:"";
$beforeName=$_SESSION['username'];

try{
    if(empty($teaName)||empty($teaInfo)||empty($teaPassword)){
        header("Location:../teaEdit.php?submit=2");
    }else{
        $EditSql="UPDATE teacher SET teaName='$teaName',teaPassword='$teaPassword',teaInfo='$teaInfo' WHERE teaName='$beforeName'";
        $EditInsert=$pdo->exec($EditSql);
        header("Location:../login.php");
    }
}catch(PODException $e){
    echo "</br>Connect ERROR!:".$e->getMessage();
    die();
}