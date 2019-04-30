<?php
include "../connect/session.php";
echo '<ul id="menu_list">
<li><a href="javascript:history.go(-1)">返回</a></li>
<li class="current_page"><a href="./stuCheckClass.php">查看已选课程</a></li>
<li><a href="#" id="btn_show_dialog" >查看通知</a></li>
<li><a href="./stuChooseClass.php">进入选课</a></li>
<li><a href="./stuedit.php">修改信息</a></li>
<li><a href="./connect/logOut.php">注销登录</a></li>
</ul>';
?>