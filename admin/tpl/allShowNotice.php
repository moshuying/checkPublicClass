<?php
include "../connect/session.php";
echo '<!--课程通知-->
<div id="dialog" class="dialog hide" minheight="320" minwidth="660">
    <div id="dlg_top" class="dlg_top"> 
        <!-- 通知框logo -->
        <img class="dlg_logo" src="../public/img/icon.png" /> 
        <label class="dlg_title">课程通知</label> 
        <input class="dlg_btn_close dlg_btn_ico dlg_btn_close_top"type="button" /> 
        <input class="dlg_btn_ico dlg_btn_max_top" type="button" />
    </div>
    <div class="dlg_content"> 
        <label style="display:inline-block; margin:10px;line-height:26px;"> 
            <div id="putNotice"></div>
        </label>
    </div>
    <!-- 底部按钮 -->
    <div class="dlg_bottom"> 
        <input id="dlg_submit" class="btn" type="button" value="最小化" /> 
        <input class="dlg_btn_close btn" type="button" value="关闭" /> 
    </div>
    <div id="dlg_right"></div>
    <div id="dlg_right_bottom"></div>
    <div id="dlg_bottom"></div>
</div>';
?>