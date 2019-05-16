<?php
include "../connect/session.php";
require "../connect/PDOconn.php";
header("Content-type:text/html;charset=utf-8");
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
$stuID=isset($_POST['stuID'])?$_POST['stuID']:"";
$stuname=isset($_POST['stuname'])?$_POST['stuname']:"";
$classname=isset($_POST['classname'])?$_POST['classname']:"";
try{
    $beforeSql="SELECT MopenChoose FROM manager";
    $beforeInfo=$pdo->query($beforeSql);
    $beforeInfo=$beforeInfo->fetchAll();
    $openChooseClass='0';
    
    foreach($beforeInfo as $key => $value){
        if($value["MopenChoose"]=='1'){$openChooseClass='1'; break;}//只要有一个管理员开启 就停止遍历
    }
    if($openChooseClass=='1'){
        //如果开放选课则查询选课id
        $checkClassIDSql="SELECT ID,number,selected,clickOn FROM lesson WHERE title='$classname'";
        $checkClassID=$pdo->query($checkClassIDSql);
        $checkClassID=$checkClassID->fetch();

        $checkClassID['clickOn']=$checkClassID['clickOn']+1;
        $addSelectedSql="UPDATE `lesson` SET `clickOn` = '".$checkClassID['clickOn']."' WHERE `lesson`.`title` = '$classname' ";
        $pdo->exec($addSelectedSql);

        //选课人数未满则执行代码
        if($checkClassID['number']>$checkClassID['selected']){
            //查询传入课程的ID
            $insertSql="SELECT * FROM studentxk WHERE username='$stuID'";
            $insertInof=$pdo->query($insertSql);
            $insertInof=$insertInof->fetchAll();
            // $oldChooseID=array_column($insertInof,'xuankeID');
            foreach ($insertInof as $key2 => $value2) {
                if($checkClassID['ID']==$value2['xuankeID']){
                    //若已经加入课程则返回状态码4
                    // echo ((int)4); 
                    $stats="4";
                }
            }
            if($stats!="4"){
                //把id添加到原有的数据中并写入数据库
                $insertEndSql="INSERT INTO `studentxk` (`username`, `xuankeID`, `xingming`, `zhuanye`, `banji`, `password`, `sex`) VALUES ('".$insertInof['0']['username']."', '".$checkClassID['ID']."', '".$insertInof['0']['xingming']."', '".$insertInof['0']['zhuanye']."', '".$insertInof['0']['banji']."', '".$insertInof['0']['password']."', '".$insertInof['0']['sex']."')";
                //添加课程号失败返回状态码7
                $pdo->exec($insertEndSql) or die ($stats='7');
                if($stats!="7"){
                    //给原有的课程中选课人数增加一次
                    $checkClassID['selected']=$checkClassID['selected']+1;$checkClassID['clickOn']=$checkClassID['clickOn']+10;
                    $addSelectedSql="UPDATE `lesson` SET `selected` = '".$checkClassID['selected']."',`clickOn` = '".$checkClassID['clickOn']."' WHERE `lesson`.`title` = '$classname' ";
                    //增加课程人数失败返回状态码6
                    $pdo->exec($addSelectedSql)or die($stats='6');
                    //全都ok的时候返回状态码1
                    if($stats!="6"){
                        $info=$_SESSION['username']."已加入".$classname."课程ID:".$checkClassID['ID'];
                        $username=$_SESSION['stuID'];
                        $sql_logs = "INSERT INTO Logs(username,ip,Info) VALUES('$username','$ip','$info')";
                        $pdo -> exec($sql_logs);
                        echo ((int)1);
                    }else{
                        echo ((int)6);
                    }
                }else{
                    echo ((int)7);
                }

            }else{
                echo ((int)4); 
            }
        }else{
            //选课人数已满返回状态码2
            echo ((int)2);
        }
    }else{
        //管理员未开放选课返回状态码3
        echo ((int)3);
    }
} catch (PDOException $e) {
    print '<br>Connect ERROR!:'.$e->getMessage(); //推荐使用英文提示,以防止页面中文乱码
    // header("Location:../teaAddClass.php?submit2=3");
    die();  //连接错误是致命错误,必须停止脚本的执行
}
// $returnJSON=array('stuname'=>$stuname,'classname'=>$classname);
// echo ($returnJSO(int)N);
?>