<?php require "../connect/session.php"; require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/publicCss/normalize.min.css">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/checkClass.css">
    <link rel="stylesheet" href="../public/scss/checkClass.scss">
    <link rel="icon" href="../public/img/logo.png">
    <link rel="stylesheet" href="../public/css/allTaitleAndmenu.css">
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <title><?php echo $_SESSION['username']; ?>的个人界面</title>
</head>
<body>
<!-- 头部展示 -->
<?php require "./tpl/Allheader.php" ?>
<!-- 响应菜单 -->
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
	<!-- 引入teaMenu.php老师管理页面菜单模板 -->
	<?php require "./tpl/MMenu.php"; ?>
</nav>
<!-- 展示课程信息部分,异步请求到信息后由js创建 -->
<div class="ClassCardBox">
    <div class="ShowClassCard">
        <!-- 显示所有的课程, -->
    </div>
</div>
<!-- 引入allShowNotice.php通知框体模板 -->
<?php require "./tpl/allShowNotice.php"; ?>
<!-- 引入页脚 -->
<?php require "./tpl/allfooter.php"; ?>
<script src="../public/js/outInfo.js"></script>
<script src="../public/js/ourGet.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>window.onload = function(){AsyscClassCard('http://47.107.231.9/ChooseClass/page2/ajax/ajaxShowAllClass.php'); AsyscNotice('http://47.107.231.9/ChooseClass/page2/ajax/ajaxteaShowNotice.php');  } </script>
</body>
</html>
