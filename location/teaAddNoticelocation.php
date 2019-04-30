<?php 
require "../connect/PDOconn.php";
include "../connect/session.php";
$className = isset($_POST['className'])?$_POST['className']:"";
$info = isset($_POST['info'])?$_POST['info']:"";
$NoticeTitle=isset($_POST['NoticeTitle'])?$_POST['NoticeTitle']:"";
$username=$_SESSION["username"];
try {
    if(!empty($info)){
        $checkclassIDSql="SELECT ID FROM lesson WHERE title='".$className."'";
        $classidQuery=$pdo->query($checkclassIDSql);
        $classidQuery=$classidQuery->fetch();
        $classid=$classidQuery['ID'];

        $addNoticeSql="INSERT into notice (className,classid,info,NoticeTitle,updateName) VALUES ('$className','$classid','$info','$NoticeTitle','$username')";
        $addNoticeInsert=$pdo -> exec ($addNoticeSql);
        header("Location:../teaAddNotice.php?Note=1");
    }else{
        header("Location:../teaAddNotice.php?Note=2");
    }
} catch (PDOException $e) {
    echo $e->getMessage();
    header("Location:../teaAddNotice.php?Note=3");
}
?>