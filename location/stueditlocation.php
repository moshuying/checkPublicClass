<?php 

require "../connect/PDOconn.php";
include "../connect/session.php";

$beforeID=$_SESSION['stuID'];
$banji=isset($_POST['banji'])?$_POST['banji']:"";
$zhuanye=isset($_POST['zhuanye'])?$_POST['zhuanye']:"";
$password=isset($_POST['password'])?$_POST['password']:"";
$xingming=isset($_POST['xingming'])?$_POST['xingming']:"";
$studentID=isset($_POST['studentID'])?$_POST['studentID']:"";
$sex=isset($_POST['sex'])?$_POST['sex']:"";

try{
    if(empty($xingming)||empty($zhuanye)||empty($banji)||empty($password)||empty($studentID)||empty($sex)){
        //全部都为空
        header("Location:../admin/stuedit.php?submit=2");
    }else{
        $EditSql="UPDATE studentxk SET sex='$sex',username='$studentID',xingming='$xingming',password='$password',banji='$banji',zhuanye='$zhuanye' WHERE username='$beforeID'";
        $EditInsert=$pdo->exec($EditSql);
        header("Location:../login.php");
    }
}catch(PODException $e){
    echo "</br>Connect ERROR!:".$e->getMessage();
    header("Location:../admin/stuedit.php?submit=3");
    die();
}