<?php
include "../connect/session.php";
echo '<ul id="menu_list">
<li><a href="javascript:history.go(-1)">返回</a></li>
<li class="current_page"><a href="./teaCheckClass.php">我的主讲课程</a></li>
<li><a href="./teaShowAllClass.php" >所有课程</a></li>
<li><a href="#" id="btn_show_dialog" >查看通知</a></li>
<li><a href="./teaAddNotice.php" >添加通知</a></li>
<li><a href="./teaAddClass.php">添加课程</a></li>
<li><a href="./teaOpenChoose.php">更多功能</a></li>
<li><a href="./teaEdit.php">修改您的信息</a></li>
<li><a href="./connect/logOut.php">注销登录</a></li>
</ul>';
?>