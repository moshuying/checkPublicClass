<?php
require "./connect/PDOconn.php";
include "./connect/session.php";
$username = isset($_POST['username'])?$_POST['username']:"";
$password = isset($_POST['password'])?$_POST['password']:"";
$ip = ($_SERVER["HTTP_VIA"]) ? $_SERVER["HTTP_X_FORWARDED_FOR"] : $_SERVER["REMOTE_ADDR"];
$ip = ($ip) ? $ip : $_SERVER["REMOTE_ADDR"];
try{ 
    if(!empty($username)&&!empty($password)){
        if($username[0]=="0"){
            //第一位为0 检查老师账号
            $tealoginSql="SELECT jobNumber,teaPassword,teaName FROM teacher WHERE jobNumber = ".$username." AND teaPassword= ".$password; 
            $tealoginQuery=$pdo->query($tealoginSql);
            $tealoginQuery=$tealoginQuery->fetch();
            if($username==$tealoginQuery['jobNumber']&&$password==$tealoginQuery['teaPassword']){
                session_start();
                $_SESSION['username']=$tealoginQuery['teaName'];
                $_SESSION['stuID']=$tealoginQuery['jobNumber'];
                //登陆成功, 写入日志 
                $info=$tealoginQuery['teaName']."登陆成功";
                $sql_logs = "INSERT INTO Logs(username,ip,Info) VALUES('$username','$ip','$info')";
                $pdo -> exec($sql_logs);
                // echo "登陆成功";
                usleep(500);//页面跳转太快,会出现数据还未写完页面已经发生跳转,暂停0.5秒等到数据写完再进行下一步操作
                header("Location:./admin/Mindex.php");
            }else {
            //用户名或密码错误，赋值err为1
            header("Location:../login.php?err=1");
            }
            //老师账号检查完毕
        } 
        if($username[0]=='2'){
            //第一位为2 检查学生账号    
            $loginSql="SELECT username,password,xingming,xuankeID FROM studentxk WHERE username = ".$username." AND password= '".$password."'"; 
            //执行sql语句
            $result=$pdo->query($loginSql);
            $result=$result->fetch();
            if($username==$result['username']&&$password==$result['password']){
                session_start();
                $_SESSION['username']=$result['xingming'];
                $_SESSION['stuID']=$result['username'];
                //登陆成功, 写入日志
                $info=$result['xingming']."登陆成功";
                $sql_logs = "INSERT INTO Logs(username,ip,Info) VALUES('$username','$ip','$info')";
                $pdo -> exec($sql_logs);
                usleep(500);//页面跳转太快,会出现数据还未写完页面已经发生跳转,暂停0.5秒等到数据写完再进行下一步操作
                header("Location:./stu/stuCheckClass.php");
            }else {
            //用户名或密码错误，赋值err为1
            header("Location:./login.php?err=1");
            }
            //学生账号检查完毕
        }  
        if($username[0]=='6'){
            //第一位为6 检查管理员账号
            $tealoginSql="SELECT MID,Mpassword,Mname FROM manager WHERE MID = ".$username." AND Mpassword= ".$password; 
            $tealoginQuery=$pdo->query($tealoginSql);
            $tealoginQuery=$tealoginQuery->fetch();
            if($username==$tealoginQuery['MID']&&$password==$tealoginQuery['Mpassword']){
                session_start();
                $_SESSION['username']=$tealoginQuery['Mname'];
                $_SESSION['stuID']=$tealoginQuery['MID'];
                //登陆成功, 写入日志
                $info=$tealoginQuery['Mname']."登陆成功";
                $sql_logs = "INSERT INTO Logs(username,ip,Info) VALUES('$username','$ip','$info')";
                $pdo -> exec($sql_logs);
                usleep(500);//页面跳转太快,会出现数据还未写完页面已经发生跳转,暂停0.5秒等到数据写完再进行下一步操作
                header("Location:./admin/Mindex.php");
            }else {
            //用户名或密码错误，赋值err为1
            header("Location:./login.php?err=1");
            }
            //管理员账号检查完毕            
        }

    }else {
    //用户名或密码为空，赋值err为2
    header("Location:./login.php?err=2");
    }
} catch (PDOException $e) {
    print '<br>Connect ERROR!:'.$e->getMessage(); //推荐使用英文提示,以防止页面中文乱码
    die();  //连接错误是致命错误,必须停止脚本的执行
}
?>