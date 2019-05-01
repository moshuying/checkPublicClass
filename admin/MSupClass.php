<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./js/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
    <script src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>
    
    <title></title>
</head>
<body>
<div class="x-nav">
    <span class="layui-breadcrumb" style="visibility: visible;">
    <a href="#bottom" onclick="location.reload()">刷新</a>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
    <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<!-- 导航部分结束 -->
    <table class="layui-hide" id="supClass" lay-filter="supClass" ></table>
    <script type="text/html" id="toolBarCheck">
        <div class="layui-btn-container">
            <!-- 搜索课程名字 -->
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                <button class="layui-btn layui-btn-sm" lay-event="addClass">添加课程</button>
            </div>
        </div>
    </script>
    <script type="text/html" id="toolBarDo">
      <a class="layui-btn layui-btn-xs layui-input-inline" lay-event="datail">查看</a>
      <a class="layui-btn layui-btn-xs layui-input-inline" lay-event="edit">编辑</a>
      <a class="layui-btn layui-btn-xs layui-input-inline" lay-event="download">下载</a>
      <a class="layui-btn layui-btn-danger layui-btn-xs layui-input-inline" lay-event="del">删除</a>
    </script>
    <script>
layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#supClass'
    ,height:600
    ,url:'../ajax/ajaxMSupClass.php'
    ,toolbar: '#toolBarCheck'
    ,cellMinWidth:20
    ,title: '课程信息表'
    ,even:true
    ,limits:[10,20,50]
    ,limit:10
    ,totalRow:true
    ,loading:true
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'ID', title:'ID', width:70, fixed: 'left', unresize: true, sort: true,totalRowText:"合计"}
      ,{field:'title', title:'课程名字', width:200, edit: 'text'}
      ,{field:'author', title:'主讲人', width:150, edit: 'text', templet: function(data){
        return '<em>'+ data.author +'</em>'
      }}
      ,{field:'hidden',title:'开启/关闭课程',width:120,unresize:true,filter:"isShow",sort:false
        ,templet:function(data){
          if(data.hidden=="0"){
            return `<input type="checkbox"
            name="hidden" 
            id="chengeStatus"
            value="`+data.ID+`"
            lay-event="chengeStatus"
            lay-skin="switch"
            lay-text="开启|关闭"
            lay-filter="isShow" onclick="test(this)" checked>`;
          }else{
            return `<input type="checkbox"
            name="hidden" 
            id="chengeStatus"
            value="`+data.ID+`"
            lay-event="chengeStatus"
            lay-skin="switch"
            lay-text="开启|关闭"
            lay-filter="isShow"onclick="test(this)" >`;
          }
        }

      }
      ,{field:'logoSource',title:"图片",unresize:true,sort:false,width:160,templet:function(data){
        return `<div class="layer-photos-demo" style="cursor:pointer;">
                  <img layer-pid="`+data.logoSource+`"  layer-src="`+data.logoSource+`" src="`+data.logoSource+`" alt="`+data.title+`">
                </div>`;
      }}
      ,{field:'number', title:'课程人数', width:120, edit: 'text', sort: true,totalRow: true}
      ,{field:'selected', title:'已选人数', width:100,totalRow: true}
      ,{field:'time1', title:'上课时间1', width:300}
      ,{field:'time2', title:'上课时间2', width:300}
      ,{field:'time3', title:'上课时间3', width:300}
      ,{field:'time4', title:'上课时间4', width:300}
      ,{field:'createtime', title:'创建时间',width:200,sort:true}
      ,{fixed: 'right', title:'操作',toolbar: '#toolBarDo', width:230,}
    ]]
    ,page: true
    ,done: function(res, curr, count) { //表格数据加载完后的事件
    //调用示例
    layer.photos({//点击图片弹出
        photos: '.layer-photos-demo'
        //,anim: 1 //0-6的选择，指定弹出图片动画类型，默认随机（请注意，3.0之前的版本用shift参数）
    });

    console.log(res);
  }
  });
  
  //头工具栏事件
  table.on('toolbar(supClass)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        layer.alert(JSON.stringify(data));
      break;
      case 'getCheckLength':
        var data = checkStatus.data;
        layer.msg('选中了：'+ data.length + ' 个');
      break;
      case 'isAll':
        layer.msg(checkStatus.isAll ? '全选': '未全选');
      break;
      case 'addClass':
        layer.open({ 
          title: '添加课程'
          ,type: 2
          //,skin: 'layui-layer-rim', //加上边框 
          ,area: ['80%', '80%'] //宽高 
          ,content: 'MAddClass.php' //弹出的页面 
          ,shadeClose: true //点击遮罩关闭 
        });
      break;
    };
  });
  //修改课程状态
  table.on('tool(hidden)',function(obj){
	  layer.msg("123");
    console.log(data.elem); //得到checkbox原始DOM对象
  console.log(data.elem.checked); //是否被选中，true或者false
  console.log(data.value); //复选框value值，也可以通过data.elem.value得到
  console.log(data.othis); //得到美化后的DOM对象
  });
  //监听行工具事件
  table.on('tool(supClass)', function(obj){
    var data = obj.data;
    switch (obj.event){
      case 'del':
      layer.confirm('真的删除行么', function(index){
        obj.del();
        layer.close(index);
      });
      break;
      case 'edit':
        layer.open({ 
          title: ''+data.title
          ,type: 2
          //,skin: 'layui-layer-rim', //加上边框 
          ,area: ['80%', '80%'] //宽高 
          ,content: 'MAddClass.php' //弹出的页面 
          ,shadeClose: true //点击遮罩关闭 
        });
      break;
      case 'datail':
       layer.confirm(data.ID);
      break;
      case 'download':
      MdownloadInfoBefor(data.title);
      break;
    }
  });
});

    </script>
<script src="../public/js/publicJs/ajaxMpowerForDataTable.js"></script>    
</body>
</html>