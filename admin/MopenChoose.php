<?php error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../public/img/logo.png">
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/reset.css">
    <link rel="stylesheet" href="../public/css/modernforms.css">
    <link rel="stylesheet" href="../public/css/font-awesome.min.css">
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
</head>
<body style="background-color:#f1f1f1;">
<a style="display:none"><?php echo $_SESSION['stuID']; ?></a>
<a style="display:none" id="checkID"><?php echo $_SESSION['stuID']; ?></a>
<div class="x-nav">
    <span class="layui-breadcrumb" style="visibility: visible;">
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
    <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>

<div class="modern-forms">
    <div class="modern-container">
        <fieldset>
            <div class="form-row">
                <div class="col col-6" style="width: 100%;">
                    <div class="field-group">
                    <select name="className" class="selectImgIconTest" id="getMenu"><option value="">课程名单</option></select>
                        <label class="mdn-label">课程操作</label>
                        <div class="layui-btn-container">
                        <button  onclick="MdownloadInfoBefore()" class="layui-btn layui-btn-lg " >下载此课程的学生信息</button>
                        <button  onclick="MdownloadInfoBeforeOld()" class="layui-btn layui-btn-lg layui-btn-warm" >旧版下载(文件出错请点此处)</button>
                        <button  onclick="McloseClassBefore(this)" class="layui-btn layui-btn-lg  layui-btn-danger" >删除此课程</button>
                        </div>
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
<script src="../public/js/JsonExportExcel.min.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script src="../public/js/publicJs/ajaxMpower.js" charset="utf-8"></script>
<script src="../public/js/publicJs/ajaxOldMpower.js" charset="utf-8"></script>
<script src="../public/js/ourGet.js"></script>
<script>window.onload = function(){  checkOpen(); AsyscGetMenu();} </script>
</body>
</html>
