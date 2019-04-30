<?php require "../connect/session.php"; error_reporting(E_ALL^E_NOTICE^E_WARNING); require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../public/img/logo.png">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/checkClass.css">
    <link rel="stylesheet" href="../public/scss/checkClass.scss">
    <link rel="stylesheet" href="../public/css/allTaitleAndmenu.css">
    <link rel="stylesheet" href="../public/css/modernforms.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/css/themes/theme-green.css">
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <title><?php echo  $_SESSION['username']; ?>的个人界面</title>
</head>
<body>
<a style="display:none"><?php echo $_SESSION['stuID']; ?></a>
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
            <fieldset>
                <div class="form-row">
                    <div class="col col-6" style="width: 100%;">
                        <div class="field-group">
                        <select name="className" class="selectImgIconTest" id="getMenu"><option value="">课程名单</option></select>
                            <label class="mdn-label">课程操作</label>
                            <button  onclick="MdownloadInfoBefore()" class="mdn-button btn-primary btn-raised" style="width:100%">下载此课程的学生信息</button>
							<br>
							<button  onclick="MdownloadInfoBeforeOld()" class="mdn-button btn-primary btn-raised" style="width:100%;margin-top: 2rem;">旧版下载(文件出错请点此处)</button>
                            <button  onclick="McloseClassBefore(this)" class="mdn-button btn-primary btn-raised" style="width:100%;margin-top: 2rem;">删除此课程</button>
                        </div>
                    </div>
                </div><!-- end form-row -->
            </fieldset>
<br><br>
            <div class="mdn-footer">
			
                <button  id="beforeTouch" onclick="" class="mdn-button btn-primary btn-raised" style="width:100%">检查选课开启/关闭状态中...</button>
                <button          onclick="goBack()" class="mdn-button btn-primary btn-raised"  style="width:100%">返回个人主页</button>
            </div>
    </div><!-- modern-container -->
</div><!-- modern-forms -->
<!-- 引入通知框体模板 -->
<?php require "./tpl/allShowNotice.php"; ?>
<!-- 引入页脚 -->
<?php require "./tpl/allfooter.php"; ?>
<script src="../public/js/JsonExportExcel.min.js"></script>
<script src="../public/js/outInfo.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script src="../public/js/publicJs/ajaxMpower.js" charset="utf-8"></script>
<script src="../public/js/publicJs/ajaxOldMpower.js" charset="utf-8"></script>
<script src="../public/js/ourGet.js"></script>
<script>window.onload = function(){AsyscNotice('./stu/ajax/ajaxteaShowNotice.php');  checkOpen(); AsyscGetMenu();} </script>
</body>
</html>
