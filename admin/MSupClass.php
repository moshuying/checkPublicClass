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
    <a href="MAddClass.php">
      添加课程
    </a>
    <span lay-separator="">/</span>
    <a href="#bottom">页面底部</a>
    <span lay-separator="">/</span>
    <a onclick="xadmin.add_tab('修改课程信息','member-list1.html',true)">
        <cite>修改课程信息</cite>
    </a>
    </span>
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
            </div>
        </div>
    </script>
    <script type="text/html" id="toolBarDo">
      <a class="layui-btn layui-btn-xs layui-input-inline" lay-event="edit">编辑</a>
      <a class="layui-btn layui-btn-danger layui-btn-xs layui-input-inline" lay-event="del">删除</a>
      <div class="layui-form" action="">
      <div class="layui-form-item">
      <div class="layui-input-inline">
        <input type="checkbox" name="yyy" lay-skin="switch" lay-text="ON|OFF" lay-event="onOff" checked>
      </div>
	  </div>
</div>
    </script>
    <script>
        layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#supClass'
	  ,height:600
    ,url:'../ajax/ajaxMSupClass.php'
    ,toolbar: '#toolBarCheck'
    ,title: '用户数据表'
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'ID', title:'ID', width:70, fixed: 'left', unresize: true, sort: true}
      ,{field:'title', title:'课程名字', width:200, edit: 'text'}
      ,{field:'author', title:'主讲人', width:150, edit: 'text', templet: function(data){
        return '<em>'+ data.author +'</em>'
      }}
      ,{field:"hidden",title:"课程状态",width:100,sort:true}
      ,{field:'number', title:'课程人数', width:120, edit: 'text', sort: true}
      ,{field:'selected', title:'已选人数', width:100}
      ,{field:'time1', title:'上课时间1', width:300}
      ,{field:'time2', title:'上课时间2', width:300}
      ,{field:'time3', title:'上课时间3', width:300}
      ,{field:'time4', title:'上课时间4', width:300}
      ,{field:'createtime', title:'创建时间',width:200,sort:true}
      ,{fixed: 'right', title:'操作',toolbar: '#toolBarDo', width:160,}
    ]]
    ,page: true
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
    };
  });
  
  //监听行工具事件
  table.on('tool(supClass)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
      layer.confirm('真的删除行么', function(index){
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      layer.prompt({
        formType: 2
        ,value: data.email
      }, function(value, index){
        obj.update({
          email: value
        });
        layer.close(index);
      });
    }else if(obj.event==='close'){

    }
  });
});

    </script>
</body>
</html>