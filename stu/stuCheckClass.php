<?php require "../connect/session.php"; error_reporting(E_ALL^E_NOTICE^E_WARNING);  require "./connect/stupower.php" ?>
<!DOCTYPE html><html lang="en">
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
<?php require "./tpl/Allheader.php" ?>
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
	<!-- 引入stuMenu.php学生页面菜单模板 -->
	<?php require "./tpl/stuMenu.php"; ?>
</nav>
<!-- 展示课程信息部分,异步请求到信息后由js创建 -->
<div class="ClassCardBox">
    <div class="ShowClassCard"></div>
</div>
<!-- 引入通知框体模板 -->
<?php require "./tpl/allShowNotice.php"; ?>
<!-- 引入页脚 -->
<?php require "./tpl/allfooter.php"; ?>
<script src="../public/js/ourGet.js"></script>
<script src="../public/js/outInfo.js"></script> 
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>window.onload = function(){showDialog();AsyscNotice('./stu/ajax/ajaxteaShowNotice.php'); AsyscClassCard('./stu/ajax/ajaxStuShowClassCard.php'); } </script>
</body>
</html>
