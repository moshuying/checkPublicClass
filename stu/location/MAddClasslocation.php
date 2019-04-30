<?php
require "../connect/PDOconn.php";
include "../connect/session.php";
$preparation=isset($_POST['preparation'])?($_POST['preparation']):"";
$title=isset($_POST['title'])?($_POST['title']):"";
$author=isset($_POST['author'])?($_POST['author']):"";
$miaoshu=isset($_POST['miaoshu'])?($_POST['miaoshu']):"";
$number=isset($_POST['number'])?($_POST['number']):"";
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
    if($_FILES["file"]["error"]){
        echo $_FILES["file"]["error"];    
    } else {
        //没有出错 判断上传文件类型为png或jpg且大小不超过1024000B
        if(($_FILES["file"]["type"]=="image/png"||$_FILES["file"]["type"]=="image/jpeg"||$_FILES["file"]["type"]=="image/gif")&&$_FILES["file"]["size"]<1024000){
            $filename ="classImages/".time().$_FILES["file"]["name"];//防止文件名重复
            $filename =iconv("UTF-8","gb2312",$filename);//转码，把utf-8转成gb2312,返回转换后的字符串， 或者在失败时返回 FALSE。
            if(file_exists($filename)){//检查文件或目录是否存在
                //echo"该文件已存在";
            }else{  
                //保存文件,   move_uploaded_file 将上传的文件移动到新位置  
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$filename)){//将临时地址移动到指定地址    
                    //讲全部信息写入数据库
                    if(empty($title)||empty($author)||empty($miaoshu)||empty($neirong1)||empty($preparation)){
                        header("Location:../MAddClass.php?submit2=2");
                    }else{
                        $pathFileNmae="./location/".$filename;
                        $addClassSql="INSERT INTO lesson (title,author,miaoshu,preparation,neirong1,time1,neirong2,time2,neirong3,time3,neirong4,time4,number,logoSource) VALUES ('$title','$author', '$miaoshu', '$preparation','$neirong1','$time1','$neirong2','$time2', '$neirong3','$time3', '$neirong4','$time4','$number','$pathFileNmae')";
                        $addClassSqlInsert=$pdo->exec($addClassSql);
                        header("Location:../MAddClass.php?submit2=1");
                    }
                }else{ 
                    header("Location:../MAddClass.php?submit2=4");
                }
            }
        }else{
            header("Location:../MAddClass.php?submit2=4");
        }
    }
    
} catch (PDOException $e) {
    //print '<br>Connect ERROR!:'.$e->getMessage(); //推荐使用英文提示,以防止页面中文乱码
    header("Location:../MAddClass.php?submit2=3");
    die();  //连接错误是致命错误,必须停止脚本的执行
}


?>