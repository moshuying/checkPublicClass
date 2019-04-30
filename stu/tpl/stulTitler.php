<?php
include "../connect/session.php" ;
$duft="icon.png";
if($_SESSION['username']=="刘树林") $duft="shuling.png";
echo '<div class="taitle">
        <div class="active">
            <div class="left">
                <div class="leftIcon"></div>
                <span><p>西南科技大学城市学院</p>学生选课系统</span>
            </div>
            <div class="right">
                <div class="userimg">
                    <img src="../public/img/'.$duft.'" alt="" width="40px" height="40px">
                </div>
                <div class="userinof">
                    <span>'.$_SESSION['username'].'</span>
                    <p>学生</p>
                </div>
            </div>
        </div>
    </div>
<nav>
    <div id="menu_button_wrapper">
		<div id="menu_button">
			Menu&nbsp;&nbsp;
			<div id="hamburger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<ul id="menu_list">
        <li><a href="./login.php">返回登录</a></li>
        <li class="current_page"><a href="./stuCheckClass.php">查看已选课程</a></li>
		<li><a href="./stuChooseClass.php">进入选课</a></li>
		<li><a href="./stuedit.php">修改信息</a></li>
		<li><a href="./connect/logOut.php">退出登录</a></li>
	</ul>
</nav>

    ';
?>