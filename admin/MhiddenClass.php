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
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
</head>
<body style="background-color:#f1f1f1;">

<a style="display:none"><?php echo $_SESSION['stuID']; ?></a>
<div class="modern-forms">
    <div class="modern-container">
            <fieldset>
                <div class="form-row">
                    <div class="col col-6" style="width: 100%;">
                        <div class="field-group">
                        <select name="className" class="selectImgIconTest" id="getMenu"><option value="">课程名单</option></select>
                            <label class="mdn-label">课程操作</label>
                            <button  onclick="McloseClassBefore(this)" class="layui-btn layui-btn-lg  layui-btn-danger" >删除此课程</button>
                        </div>
                    </div>
                </div><!-- end form-row -->
            </fieldset>
    </div><!-- modern-container -->
</div><!-- modern-forms -->
<script src="../public/js/JsonExportExcel.min.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script src="../public/js/publicJs/ajaxMpower.js" charset="utf-8"></script>
<script src="../public/js/publicJs/ajaxOldMpower.js" charset="utf-8"></script>
<script src="../public/js/ourGet.js"></script>
<script>window.onload = function(){  checkOpen(); AsyscGetMenu();} </script>
</body>
</html>
