<?php require "../connect/session.php"; require "../connect/Mpower.php" ?>
<!DOCTYPE html>
<html lang="en">
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
    <script src="../public/js/jquery-2.1.1.min.js"></script>
    <title><?php echo $_SESSION['username']; ?>的个人界面</title>
</head>
<body>
<!-- 添加信息 -->
<form action="../location/MAddClasslocation.php" method="post" enctype="multipart/form-data" >
<input id="jumpCLICK" type="file" name="file" onchange="PreviewImage(this,'imgHeadPhoto','divPreview');" size="20" accept=".jpg,.png,.gif,.jpeg" style="display: none;" />
<div class="modern-forms">
        	<div class="modern-container">

                    <fieldset>
                        <div class="form-row">
                            <div class="col col-6">
                                <div class="field-group" style="max-height: 46px;">
                                    <input type="text" class="mdn-input" name="title" placeholder="课程名字" >
                                    <!-- <select name="beforeTitle" class="selectImgIconTest" id="getMenu" style="max-width: 45%;" ></select> -->
                                    <label class="mdn-label">课程名字</label>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="author" placeholder="主讲人">
                                    <label class="mdn-label">主讲人</label>
                                    <span class="mdn-icon"><i class="fa fa-envelope"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>  
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="miaoshu" placeholder="课程简介">
                                    <label class="mdn-label">课程简介</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="preparation" placeholder="开课前准备">
                                    <label class="mdn-label">开课前准备</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="number" placeholder="课程人数">
                                    <label class="mdn-label">课程人数</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="preparation" placeholder="课程内容1">
                                    <label class="mdn-label">课程描述</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="neirong1" placeholder="课程内容1">
                                    <label class="mdn-label">课程内容1</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="time1" placeholder="例:2019年4月12日9:00~11:00 博明楼103">
                                    <label class="mdn-label">上课时间1</label>
                                    <span class="mdn-icon"><i class="fa fa-calendar"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="neirong2" placeholder="课程内容2">
                                    <label class="mdn-label">课程内容2</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="time2" placeholder="例:2019年4月12日9:00~11:00 博明楼103">
                                    <label class="mdn-label">上课时间2</label>
                                    <span class="mdn-icon"><i class="fa fa-calendar"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="neirong3" placeholder="课程内容3">
                                    <label class="mdn-label">课程内容3</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="time3" placeholder="例:2019年4月12日9:00~11:00 博明楼103">
                                    <label class="mdn-label">上课时间3</label>
                                    <span class="mdn-icon"><i class="fa fa-calendar"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="neirong4" placeholder="课程内容4">
                                    <label class="mdn-label">课程内容4</label>
                                    <span class="mdn-icon"><i class="fa fa-globe"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <input type="text" class="mdn-input" name="time4" placeholder="例:2019年4月12日9:00~11:00 博明楼103">
                                    <label class="mdn-label">上课时间4</label>
                                    <span class="mdn-icon"><i class="fa fa-calendar"></i></span>
                                    <span class="mdn-bar"></span>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <div id="divPreview"><img id="imgHeadPhoto" src="../public/img/picture.jpg" style="width: 100%; height: 170px; border: solid 1px #d2e2e2;bckground-size: cover;" alt="" /></div>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6 addCLASSnone">
                                <div class="field-group prepend-icon">
                                    <div id="divPreview"><img id="imgHeadPhoto2" onclick="$('#jumpCLICK').click();" src="../public/img/upRule.png" style="width: 100%; height: 170px; border: solid 1px #d2e2e2;bckground-size: cover;" alt="" /></div>
                                </div>
                            </div><!-- end col-6 -->
                            <div class="col col-6">
                                <div class="field-group prepend-icon">
                                    <label class="mdn-label" style="color:red;"><?php $submit2=isset($_GET["submit2"])?$_GET["submit2"]:"";switch($submit2) {
                                    case 1:echo "<script>alert('添加课程成功!');</script>";break; 
                                    case 2:echo "<script>alert('提交失败!您有信息尚未输入!');</script>";break; 
                                    case 3:echo "<script>alert('提交失败!数据库连接错误,请检查您的网络!');</script>";break;
                                    case 4:echo "<script>alert('提交失败!上传图片类型有误,请检查你选择文件的后缀名是否为(.jpg .gif .png)');</script>";break;
                                    case 5:echo "<script>alert('课程信息提交成功,但课程图片提交失败');</script>";break;
                                    case 6:echo "<script>alert('课程图片上传失败');</script>";break;}?></label>
                                    <span class="mdn-bar"></span>
                                </div>  
                            </div><!-- end col-6 -->
                        </div><!-- end form-row -->
                    </fieldset>

                    <div class="mdn-footer">
                        <!-- <button type="button" class="mdn-button btn-primary" onclick="backTeaCheckClass()";>查看全部课程</button> -->
                        <input  type="submit" class="mdn-button btn-primary" value="上传" style="width: 100%;" />
                    </div>
                </form>    
            </div><!-- modern-container -->
        </div><!-- modern-forms -->
        
</div><!-- 上传图像部分结束 -->
<script src="../public/js/ourGet.js"></script>
<script src="../public/js/publicJs/ajaxAsysc.js"></script>
<script>
$(document).ready(function(){$('#imgHeadPhoto').click(function(){$('#jumpCLICK').click();});$('#imgHeadPhoto2').click(function(){$('#jumpCLICK').click();});});
</script>
</body>
</html>
