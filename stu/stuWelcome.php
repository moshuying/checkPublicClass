<?php include "../connect/session.php";
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title><?php echo $_SESSION['username']; ?>的个人界面</title>
</head>
<body style="background-color:#f1f1f1;">
<div class="x-nav">
    <span class="layui-breadcrumb" style="visibility: visible;">
    <a href="#">返回顶部</a><span lay-separator="">/</span>
    <a href="#bottom">页面底部</a><span lay-separator="">/</span>
    <a>
        <cite>导航元素</cite></a>
    </span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
        <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<!-- 展示课程信息部分,异步请求到信息后由js创建 -->
<div class="ClassCardBox">
    <div class="ShowClassCard">
        <!-- 显示所有的课程, -->
    </div>
</div>
<div class="layui-col-md12">
    <div class="layui-card">
        <div class="layui-card-header">开发团队</div>
        <div class="layui-card-body ">
            <table class="layui-table">
                <tbody>
                <tr>
                    <th>版权所有</th>
                    <td>墨抒颖</td>

                </tr>
                <tr>
                    <th>开发者</th>
                    <td>墨抒颖<a style="color:#FF5722;" href="mailto:146008332@qq.com">E-mail:1460083332@qq.com</a></td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="bottom"></div>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>window.onload = function(){AsyscClassCard('../ajax/ajaxStuShowClassCard.php'); } </script>
</body>
</html>