<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
    <title>西城选课系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="./admin/css/font.css">
    <link rel="stylesheet" href="./admin/css/login.css">
    <link rel="stylesheet" href="./admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="./admin/lib/layui/layui.js" charset="utf-8"></script>
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">西城公开课选课系统</div>
        <div id="darkbannerwrap"></div>
        
        <form action="./loginlocation.php" method="post">
                    <input type="text" name="username"     class="input" onblur="inputFigure(this.form.username)" maxlength="9" placeholder="学号/工号" />
                    <a name="usernameOut"></a>
                    <input type="password" name="password" class="input" maxlength="16" placeholder="密码" />
                    <?php $err=isset($_GET["err"])?$_GET["err"]:"";switch($err) {
                        case 1:echo "用户名或密码错误！";break;
                        case 2:echo "用户名或密码不能为空！";break;
                        case 3:echo "<script>alert('您进入了错误的页面!')</script>";
                    }?>
                    <input type="submit" id="login-button" name="login" class="butto" />

                </form>
    </div>

    <script>
        $(function  () {
            layui.use('form', function(){
              // var form = layui.form;
              // layer.msg('玩命卖萌中', function(){
              //   //关闭后的操作
              //   });
              //监听提交
              // form.on('submit(login)', function(data){
              //   // alert(888)
              //   layer.msg(JSON.stringify(data.field),function(){
              //       location.href='index.html'
              //   });
              //   return false;
              // });
            });
        })
    </script>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>