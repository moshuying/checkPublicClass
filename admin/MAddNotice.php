<?php require "../connect/session.php"; require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../public/img/logo.png">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/checkClass.css">
    <link rel="stylesheet" href="../public/scss/checkClass.scss">
    <link rel="stylesheet" href="../public/css/allTaitleAndmenu.css">
    <link rel="stylesheet" href="../public/css/modernforms.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <title><?php echo $_SESSION['username']; ?>的个人界面</title>
</head>
<body>
<!-- 头部show -->
<?php require "./tpl/Allheader.php" ?>
<!-- 菜单 -->
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
<!-- 修改个人信息 -->
<div class="modern-forms">
    <div class="modern-container">
        <form action="../location/teaAddNoticelocation.php" method="POST">
            <fieldset>
                <div class="form-row">
                <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <input type="text" class="mdn-input" name="NoticeTitle" maxlength="250" placeholder="输入您的课程公告名">
                            <label class="mdn-label">课程公告</label>
                            <span class="mdn-icon"><i class="fa fa-envelope"></i></span>
                            <span class="mdn-bar"></span>
                        </div>  
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <input type="text" class="mdn-input" name="info" maxlength="250" placeholder="输入您的公告内容">
                            <label class="mdn-label">公告内容</label>
                            <span class="mdn-icon"><i class="fa fa-envelope"></i></span>
                            <span class="mdn-bar"></span>
                        </div>  
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group">
                            <select name="className" class="selectImgIconTest" id="getMenu"><option value='通知所有学生'>全局通知(所有学生都能看到)</option></select>
                            <label class="mdn-label">课程名字</label>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <label class="mdn-label" style="color:red;"><?php $submit=isset($_GET["submit"])?$_GET["submit"]:"";switch($submit) {case 1:echo "提交成功!";break;case 2:echo "公告信息不能为空!";break;case 3:echo "提交失败!数据库连接错误,请检查您的网络!";break;}?></label>
                            <span class="mdn-bar"></span>
                        </div>  
                    </div><!-- end col-6 -->
                </div><!-- end form-row -->
            </fieldset>
                
            <div class="mdn-footer">
                <button type="button" onclick="backTeaCheckClass()" class="mdn-button btn-primary btn-raised">返回个人主页</button>
                <button type="submit" id="putInfo"  class="mdn-button btn-primary btn-raised">提交您的信息</button>
            </div>
        </form>    
    </div><!-- modern-container -->
</div><!-- modern-forms -->
<!-- 引入通知框体模板 -->
<?php require "./tpl/allShowNotice.php"; ?>
<!-- 引入页脚 -->
<?php require "./tpl/allfooter.php"; ?>
<script src="../public/js/outInfo.js"></script>
<script src="../public/js/ourGet.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>window.onload = function(){ AsyscGetMenu(); AsyscNotice('http://47.107.231.9/ChooseClass/page2/ajax/ajaxteaShowNotice.php'); };  function backTeaCheckClass(){window.location.href="http://47.107.231.9/ChooseClass/page2/teaCheckClass.php";}</script>
</body>
</html>
