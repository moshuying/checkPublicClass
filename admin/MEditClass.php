<?php require "../connect/session.php"; require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <link rel="stylesheet" href="../public/myIcon/mobileAone/iconfont.css">
    <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    <script src="../public/js/publicJs/ajaxMpower.js"></script>
    <script src="../public/js/jquery-2.1.1.min.js"></script>
</head>
<body style="margin:0;padding:0;display: flex;justify-content: center;">
<form class="layui-form" action="../location/MUpdateClasslocation.php" method="post" style="width:80%">
<input id="jumpCLICK" type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" accept=".jpg,.png,.gif,.jpeg" style="display: none;" />
<input name="ID" type="text" id="ID" style="display:none"/>
    <div class="layui-form-item">
        <label for=""  class="layui-form-label">课程名字</label>
        <div class="layui-input-block">
            <input type="text" name="title" required id="ClassTitle" lay-verify="required" placeholder="<?php $title=$_GET['title']; echo $title;?>" class="layui-input" >
        </div>
    </div>
    <div class="layui-form-item">
        <label for=""  class="layui-form-label">主讲人 *</label>
        <div class="layui-input-inline">
            <input type="text" name="author" required id="author" lay-verify="required" placeholder="主讲人" class="layui-input" >
        </div>
    </div>
    <div class="layui-form-item">
        <label for=""  class="layui-form-label">课程简介 *</label>
        <div class="layui-input-block">
        <textarea name="miaoshu" id="miaoshu" placeholder="请输入内容" required class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <label for=""  class="layui-form-label">开课前准备 *</label>
        <div class="layui-input-block">
        <textarea name="preparation" id="preparation" required placeholder="输入开课前准备, 例如:电脑,U盘,相关书籍" class="layui-textarea"></textarea>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label for=""  class="layui-form-label" >课程人数</label>
            <div class="layui-input-inline">
                <div id="slidePeople" style="margin-top:20px;"></div>
            </div>
            <input type="text" id="classHourChange" name="number" style="display:none;">
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">请选择课时 *</label>
            <div class="layui-input-inline">
                <select  name="classHour" lay-verify="required">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
        </div>
    </div>
    <!-- <div class="layui-form-item">
        <label for="" name="preparation" class="layui-form-label">课程描述 *</label>
        <div class="layui-input-block">
        <input type="text" name="title" id="" lay-verify="required" placeholder="简单描述一下你的课程吧,20字左右" class="layui-input" >
        
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-inline">
            <label for="" class="layui-form-label">开课时间一 *</label>
                <div class="layui-input-inline">
                    <input name="time1" type="text"  required class="layui-input" id="time1" name="time1">
                </div>
            <label for="" class="layui-form-label">课程内容 *</label>
                <div class="layui-input-inline">
                    <input name="neirong1" type="text"  required id="neirong1" lay-verify="required" placeholder="输入这次课程的简单介绍" class="layui-input" >
                </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label for="" class="layui-form-label">开课时间二</label>
                <div class="layui-input-inline">
                    <input name="time2" type="text" class="layui-input" id="time2">
                </div>
            <label for="" class="layui-form-label">课程内容</label>
                <div class="layui-input-inline">
                    <input name="neirong2" type="text"  id="neirong2" placeholder="输入这次课程的简单介绍" class="layui-input" >
                </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label for="" class="layui-form-label">开课时间三</label>
                <div class="layui-input-inline">
                    <input name="time3" type="text" class="layui-input" id="time3">
                </div>
            <label for="" class="layui-form-label">课程内容</label>
                <div class="layui-input-inline">
                    <input name="neirong3" type="text"  id="neirong3" placeholder="输入这次课程的简单介绍" class="layui-input" >
                </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label for="" class="layui-form-label">开课时间四</label>
                <div class="layui-input-inline">
                    <input name="time4" type="text" class="layui-input" id="time4">
                </div>
            <label for="" class="layui-form-label">课程内容</label>
                <div class="layui-input-inline">
                    <input name="neirong4" type="text"  id="neirong4" placeholder="输入这次课程的简单介绍" class="layui-input" >
                </div>
        </div>
    </div>
    <div id="divPreview"><img id="imgHeadPhoto" src="<?php $logoSource=$_GET['logoSource']; echo $logoSource;?>" style="width: 496px; height: 200px; border: solid 1px #d2e2e2;bckground-size: cover;" alt="" /></div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn" type="submit">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
  </div>
</form>
<script>
    document.getElementById('ID').value='<?php $ID=$_GET['ID']; echo $ID;?>';
    document.getElementById('ClassTitle').value='<?php $title=$_GET['title']; echo $title;?>';
    document.getElementById('author').value='<?php $author=$_GET['author']; echo $author;?>';
    document.getElementById('miaoshu').value='<?php $miaoshu=$_GET['miaoshu']; echo $miaoshu;?>';
    document.getElementById('preparation').value='<?php $preparation=$_GET['preparation']; echo $preparation;?>';
    document.getElementById('classHourChange').value='<?php $classHour=$_GET['classHour']; echo $classHour;?>';
    document.getElementById('time1').value='<?php $time1=$_GET['time1']; echo $time1;?>';
    document.getElementById('time2').value='<?php $time2=$_GET['time2']; echo $time2;?>';
    document.getElementById('time3').value='<?php $time3=$_GET['time3']; echo $time3;?>';
    document.getElementById('time4').value='<?php $time4=$_GET['time4']; echo $time4;?>';
    document.getElementById('neirong1').value='<?php $neirong1=$_GET['neirong1']; echo $neirong1;?>';
    document.getElementById('neirong2').value='<?php $neirong2=$_GET['neirong2']; echo $neirong2;?>';
    document.getElementById('neirong3').value='<?php $neirong3=$_GET['neirong3']; echo $neirong3;?>';
    document.getElementById('neirong4').value='<?php $neirong4=$_GET['neirong4']; echo $neirong4;?>';

    layui.use(['slider','laydate','element','form'],function(){
        var $ = layui.$;
		var slider = layui.slider;
		var form = layui.form;
        //开启输入框
        slider.render({
            elem: '#slidePeople'
            ,input: true //输入框
            ,value:30//初始值30
            ,change:function(value){
                document.getElementById('classHourChange').value=value
            }
        });
        var laydate = layui.laydate;
        //执行一个laydate实例
        laydate.render({
            elem: '#time1' 
            ,format: 'yyyy年MM月dd日HH:mm'
            ,calendar: true
        });
        laydate.render({
            elem: '#time2' 
            ,format: 'yyyy年MM月dd日HH:mm'
            ,calendar: true
        });
        laydate.render({
            elem: '#time3' 
            ,format: 'yyyy年MM月dd日HH:mm'
            ,calendar: true
        });
        laydate.render({
            elem: '#time4' 
            ,format: 'yyyy年MM月dd日HH:mm'
            ,calendar: true
        });
            form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        }); 
    });
</script>
<script src="../public/js/ourGet.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>$(document).ready(function(){$('#imgHeadPhoto').click(function(){$('#jumpCLICK').click();});$('#imgHeadPhoto2').click(function(){$('#jumpCLICK').click();});});
</script>
</body>
</html>