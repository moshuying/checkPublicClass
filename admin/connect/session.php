<?php
session_start();
if(!empty($_SESSION['username'])) {
    // echo ("<script>console.log(".$_SESSION['username'].")</script>");
}else{
    header("Location:http://data.twogether.cn/ChooseClass/page2/login.php");
}
?>