<?php require "../connect/session.php"; error_reporting(E_ALL^E_NOTICE^E_WARNING); ?>
<!DOCTYPE html><html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../public/img/logo.png">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/checkClass.css">
    <link rel="stylesheet" href="../public/scss/checkClass.scss">
    <link rel="stylesheet" href="../public/css/allTaitleAndmenu.css">
    <link rel="stylesheet" href="../public/css/modernforms.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../public/css/css/themes/theme-green.css">
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <title><?php echo $_SESSION['username']; ?>的个人界面</title>
</head>
<body>
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
</nav>
<!-- 修改个人信息 -->
<div class="modern-forms">
    <div class="modern-container">
        <form action="../location/stueditlocation.php method="POST">
            <fieldset>
                <div class="form-row">
                    <div class="col col-6">
                        <span id="promptMessage" style="margin-top: -2rem;position: absolute;color:#2bbbad;"></span>
                        <div class="field-group">
                            <input type="text" class="mdn-input" name="studentID" maxlength="9" placeholder="您的学号">
                            <label class="mdn-label">学号</label>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group">
                            <input type="text" class="mdn-input" name="xingming" maxlength="4" placeholder="您的姓名">
                            <label class="mdn-label">姓名</label>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <input type="text" class="mdn-input" name="zhuanye" maxlength="14" placeholder="您的专业">
                            <label class="mdn-label">专业</label>
                            <span class="mdn-icon"><i class="fa fa-envelope"></i></span>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <input type="text" class="mdn-input" name="banji" maxlength="7" placeholder="您所在的班级">
                            <label class="mdn-label">班级</label>
                            <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <div class="mdn-input">
                                <!-- //隐藏 jq点击效果 -->
                                <label ><input id="boyCHECK" name="sex" type="radio" value="男" />男</label>
                                <label ><input  id="girlCHECK" name="sex" type="radio" value="女" />女</la></label>
                                <label class="mdn-label">性别</label>
                                <span class="mdn-icon"></span>
                                <span class="mdn-bar"></span>
                            </div>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <input type="password" class="mdn-input" name="password" maxlength="16" placeholder="您的密码">
                            <label class="mdn-label">密码</label>
                            <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                    <div class="col col-6">
                        <div class="field-group prepend-icon">
                            <label class="mdn-label" style="color:red;"><?php $submit=isset($_GET["submit"])?$_GET["submit"]:"";switch($submit) {case 1:echo "提交成功!";break;case 2:echo "信息不能为空!";break;case 3:echo "提交失败!数据库连接错误,请检查您的网络!";break;}?></label>
                            <span class="mdn-bar"></span>
                        </div>
                    </div><!-- end col-6 -->
                </div><!-- end form-row -->
            </fieldset>

            <div class="mdn-footer">
                <button type="sublim" class="mdn-button btn-primary btn-raised">提交您的信息</button>
            </div>
        </form>
    </div><!-- modern-container -->
</div><!-- modern-forms -->
</body>
</html>
