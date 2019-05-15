<?php
require "../connect/PDOconn.php";
include "../connect/session.php";
$preparation=isset($_POST['preparation'])?($_POST['preparation']):"";
$ID=isset($_POST['ID'])?($_POST['ID']):"";
$title=isset($_POST['title'])?($_POST['title']):"";
$author=isset($_POST['author'])?($_POST['author']):"";
$miaoshu=isset($_POST['miaoshu'])?($_POST['miaoshu']):"";
$number=isset($_POST['number'])?($_POST['number']):"";
$classHour=isset($_POST['classHour'])?($_POST['classHour']):"";

$neirong1=isset($_POST['neirong1'])?($_POST['neirong1']):"";
$time1=isset($_POST['time1'])?($_POST['time1']):"";
$neirong2=isset($_POST['neirong2'])?($_POST['neirong2']):"";
$time2=isset($_POST['time2'])?($_POST['time2']):"";
$neirong3=isset($_POST['neirong3'])?($_POST['neirong3']):"";
$time3=isset($_POST['time3'])?($_POST['time3']):"";
$neirong4=isset($_POST['neirong4'])?($_POST['neirong4']):"";
$time4=isset($_POST['time4'])?($_POST['time4']):"";
$number=isset($_POST['number'])?($_POST['number']):""; 
try {
    if(empty($title)||empty($author)||empty($miaoshu)||empty($neirong1)||empty($preparation)){
        header("Location:../admin/MAddClass.php?submit2=2");
    }else{
        $pathFileNmae="../location/".$filename;
        $addClassSql="UPDATE `lesson` SET `title`='$title',`author`='$author',`miaoshu`='$miaoshu',`classHour`='$classHour',`preparation`='$preparation',`neirong1`='$neirong1',`time1`='$time1',`neirong2`='$neirong2',`time2`='$time2',`neirong3`='$neirong3',`time3`='$time3',`neirong4`='$neirong4',`time4`='$time4',`number`='$number',`logoSource`='$logoSource' WHERE (`ID`='$ID')";
        $addClassSqlInsert=$pdo->exec($addClassSql);
        header("Location:../admin/MAddClass.php?submit2=1");
    }
    
} catch (PDOException $e) {
    //print '<br>Connect ERROR!:'.$e->getMessage(); //推荐使用英文提示,以防止页面中文乱码
    header("Location:../admin/MAddClass.php?submit2=3");
    die();  //连接错误是致命错误,必须停止脚本的执行
}


?>