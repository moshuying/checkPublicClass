<?php
include "../connect/session.php" ;
$username=$_SESSION['stuID'];
$username=substr($username,0,1);
switch ($username) {
    case '0':
        $status="教职工";
        break;
    case '2':
        $status="学生";
        break;
    case '6':
        $status="管理员";
        break;
    default:
        header("refresh:1;url=http://data.twogether.cn/ChooseClass/page2/connect/logOut.php?power=3");
        echo "您的身份有误!一秒后自动跳转"; 
        break;
}
echo '
<div class="taitle">
        <div class="active">
            <div class="left">
                <div class="leftIcon"></div>
                <span style="width: 100%;"><p class="headLogoImg"><p></span>
            </div>
            <div class="right">
                <div class="userimg">
                    <img src="../public/img/icon.png" alt="" width="40px" height="40px" style="height: 40px;">
                </div>
                <div class="userinof">
                    <span>'.$_SESSION['username'].'</span>
                    <p>'.$status.'</p>
                </div>
            </div>
        </div>
    </div>
';
?>