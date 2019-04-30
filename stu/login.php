<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../public/img/logo.png">
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="../public/css/index.css">
</head>
<?php //include "../connect/PDOconn.pnp"; ?>
<body>
    <div class="htmleaf-container">
        <div class="wrapper">
            <div class="container">
                <h1 class="loginBcckgroundImg"></h1>

                <form action="./location/loginlocation.php" method="post">
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
                <!-- 特效 Duang~ -->
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <script src="../public/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script>
        $('#login-button').click(function (event) {
            // event.preventDefault();
            $('form').fadeOut(100);
            // $('.wrapper').addClass('form-success');
        });
        
    </script>

    </div>
</body>

</html>