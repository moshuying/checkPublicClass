<?php
include "../connect/session.php" ;
$username-$_SESSION['username'];
if($username[0]=='0'){
    $status="教职工";
}else{
    $status="学生";
}
echo '
<div class="taitle">
        <div class="active">
            <div class="left">
                <div class="leftIcon"></div>
                <span>工程技术学院公开课</span>
            </div>
            <div class="right">
                <div class="userimg">
                    <img src="../public/img/icon.png" alt="" width="40px" height="40px">
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