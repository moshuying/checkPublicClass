<!doctype html>
<?php require "../connect/session.php";
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
require "../connect/Mpower.php" ?>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>公开课选课系统</title>
    <link rel="icon" href="../public/img/logo.png">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
        <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
        <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        // 是否开启刷新记忆tab功能
        // var is_remember = false;
    </script>
</head>
    <body class="index">
    <a href="" style="display:none;" id="checkID"><?php echo $_SESSION['stuID'] ?></a>
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="Mindex.php">公开课选课系统后台</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">+新增</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('最大化','http://www.baidu.com','','',true)">
                                <i class="iconfont">&#xe6a2;</i>弹出最大化</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出自动宽高','http://www.baidu.com')">
                                <i class="iconfont">&#xe6a8;</i>弹出自动宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出指定宽高','http://www.baidu.com',500,300)">
                                <i class="iconfont">&#xe6a8;</i>弹出指定宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开','member-list.html')">
                                <i class="iconfont">&#xe6b8;</i>在tab打开</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开刷新','member-del.html',true)">
                                <i class="iconfont">&#xe6b8;</i>在tab打开刷新</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="Mindex.php" target="_blank" title="前台">
                    <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search.html?keywords="> 
                </li>
            </ul>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;"><?php echo $_SESSION['username']; ?></a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('个人信息','MshowInof.php')">个人信息</a></dd>
                        <dd>
                            <a onclick="xadmin.open('切换帐号','../connect/logOut.php')">切换帐号</a></dd>
                        <dd>
                            <a href="../connect/logOut.php">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="Mindex.php">前台首页</a></li>
            </ul>
        </div>
        <!-- 顶部结束 -->
        <!-- 中部开始 -->
        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a onclick="xadmin.add_tab('我的桌面','Mwelcome.php')">
                            <i class="layui-icon layui-icon-home" lay-tips="首页"></i>
                            <!-- 展示欢迎页,默认不可关闭 -->
                            <cite>首页</cite></a>
                    </li>
                    <!-- <li>
                        <a onclick="xadmin.add_tab('开启/关闭选课','MopenChoose.php')">
                        <i class="layui-icon layui-icon-senior" lay-tips="开启/关闭选课"></i>
                             单独展示开启关闭选课 
                            <cite>开启/关闭选课</cite></a>
                    </li> -->
                    <li>
                        <a onclick="xadmin.add_tab('课程管理','MSupClass.php')">
                            <i class="layui-icon layui-icon-template" lay-tips="课程管理"></i>
                            <!-- 课程管理,用于查询和隐藏课程 -->
                            <cite>课程管理</cite> </a>
                    </li>
                    <li>
                        <a  onclick="xadmin.add_tab('学生管理','MSupStu.php')">
                            <i class="layui-icon layui-icon-user" lay-tips="学生管理"></i>
                            <!-- 学生管理页面,用于查询和删除学生信息 -->
                            <cite>学生管理</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('通知管理','MSupNotice.php')">
                            <i class="layui-icon layui-icon-release" lay-tips="通知管理"></i>
                            <!-- 删除和查询通知 -->
                            <!-- 增加通知设置在底下 -->
                            <cite>通知管理</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('选课信息分析','cate.html')">
                        <i class="layui-icon layui-icon-engine" lay-tips="选课信息分析"></i>
                        <!-- 选课信息图表,后台数据统计后传给前台,考虑优化省掉后台机能 -->
                        <cite>选课信息分析</cite></a>
                    </li>
                    <li>
                        <a onclick="xadmin.add_tab('学生信息分析','cate.html')">
                        <i class="layui-icon layui-icon-set-sm" lay-tips="选课信息分析"></i>
                        <!-- 学生不同选课图表分析,前台分析 -->
                            <cite>学生信息分析</cite></a>
                    </li>
                    <li> 
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="系统统计">&#xe6ce;</i>
                            <!-- 对近期日志进行统计,考虑加入到欢迎页 -->
                            <cite>其他功能</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('拆线图','echarts1.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>拆线图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('拆线图','echarts2.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>拆线图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('地图','echarts3.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>地图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('饼图','echarts4.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>饼图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('雷达图','echarts5.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>雷达图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('k线图','echarts6.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>k线图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('热力图','echarts7.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>热力图</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('仪表图','echarts8.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>仪表图</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="图标字体">&#xe6b4;</i>
                            <cite>图标字体</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('图标对应字体','unicode.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>图标对应字体</cite></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="其它页面">&#xe6b4;</i>
                            <cite>其它页面</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('示例页面','demo.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>帮助文档</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('更新日志','log.html')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>更新日志</cite></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <iframe src='./Mwelcome.php' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->
        <script>//百度统计可去掉
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>