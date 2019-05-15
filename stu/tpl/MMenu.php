<?php
include "../connect/session.php";
echo '<ul id="menu_list">
<li><a href="javascript:history.go(-1)">返回</a></li>
<li class="current_page"><a href="./MCheckClass.php" >所有课程</a></li>
<li><a href="#" id="btn_show_dialog" >查看通知</a></li>
<li><a href="./MAddNotice.php" >添加通知</a></li>
<li><a href="./MAddClass.php">添加课程</a></li>
<li><a href="./MEdit.php">修改信息</a></li>
<li><a href="./MopenChoose.php">管理员权限</a></li>
<li><a href="./connect/logOut.php">注销登录</a></li>
</ul>';
?>