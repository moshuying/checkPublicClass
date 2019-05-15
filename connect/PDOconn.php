<?php
include "config.php";
$dsn = 'mysql:host=' . $SqlServer . '; dbname=' . $db . '; charset=utf8; port=' . $port . "'";
$userName = "root";
$password = "";
try {
    //调用PDO构造函数实例化PDO类,创建PDO
    // $conn_pdo = new PDO($dsn, $userName, $password, array(PDO::ATTR_PERSISTENT => true));
    $pdo = new PDO($dsn, $userName, $password); //其它参数取默认值
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //连接是所有操作的基础,无论你设置的错误模式级别是什么,都会强制使用EXCEPTION异常模式
} catch (PDOException $e) {
    echo "<script>alert('connect error');</script>";
    echo '<br>Connect ERROR!:' . $e->getMessage(); //推荐使用英文提示,以防止页面中文乱码
    die();  //连接错误是致命错误,必须停止脚本的执行
}

//断开连接
// $conn_pdo=null;
//销毁对象
// unset($pdo);
?>