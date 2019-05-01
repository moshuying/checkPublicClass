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
    <span lay-separator="">/</span>
    <a href="#bottom">页面底部</a>
    <span lay-separator="">/</span>
    <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
    <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
</div>
<!-- 导航部分结束 -->
    <table class="layui-hide" id="supStu" lay-filter="supStu" ></table>
    <script type="text/html" id="toolBarCheck">
        <div class="layui-btn-container">
            <!-- 搜索课程名字 -->
            <div class="layui-form-item">
                <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
                <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
                <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
                <button class="layui-btn layui-btn-sm" lay-event="addClass">添加</button>
            </div>
        </div>
    </script>
    <script type="text/html" id="toolBarDo">
      <a class="layui-btn layui-btn-xs layui-input-inline" lay-event="edit">编辑</a>
      <a class="layui-btn layui-btn-danger layui-btn-xs layui-input-inline" lay-event="del">删除</a>
    </script>
    <script>
layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#supStu'
    ,height:800
    ,url:'../ajax/ajaxMSupStu.php'
    ,toolbar: '#toolBarCheck'
    ,cellMinWidth:100
    ,title: '用户数据表'
    ,even:true
    ,limits:[20,30,100]
    ,limit:20
    ,totalRow:true
    ,loading:true
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'sid', title:'ID', width:70, fixed: 'left', unresize: true, sort: true}
      ,{field:'xingming', title:'姓名',  edit: 'text'}
      ,{field:'username', title:'学号',  edit: 'text'}
      ,{field:'logoSource',title:"图片",unresize:true,sort:false,width:160,templet:function(data){
        return `<div class="layer-photos-demo" style="cursor:pointer;">
                  <img layer-pid="`+data.logoSource+`"  layer-src="`+data.logoSource+`" src="`+data.logoSource+`" alt="`+data.title+`">
                </div>`;
      }}
      ,{field:'zhuanye', title:'专业', width:200, edit: 'text'}
      ,{field:'banji', title:'班级', width:200, edit: 'text'}
      ,{field:'xuankeID', title:'已选课程', width:100, edit: 'text'}
      ,{field:'password', title:'密码', width:80, edit: 'text'}
      ,{field:'sex', title:'性别', width:80, edit: 'text'}
      ,{field:'createtime', title:'创建时间',width:200,sort:true}
      ,{fixed: 'right', title:'操作',toolbar: '#toolBarDo', width:160,}
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
  table.on('toolbar(supStu)', function(obj){
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
          title: '添加学生信息'
          ,type: 2
          //,skin: 'layui-layer-rim', //加上边框 
          ,area: ['80%', '80%'] //宽高 
          ,content: 'MAddStu.php' //弹出的页面 
          ,shadeClose: true //点击遮罩关闭 
        });
      break;
    };
  });
  //监听行工具事件
  table.on('tool(supStu)', function(obj){
    var data = obj.data;
    //console.log(obj)
    if(obj.event === 'del'){
      layer.confirm('真的删除'+data.xingming+'么', function(index){
        obj.del();
        layer.close(index);
      });
    } else if(obj.event === 'edit'){
      layer.open({ 
        title: ''+data.xingming
        ,type: 2
        //,skin: 'layui-layer-rim', //加上边框 
        ,area: ['80%', '80%'] //宽高 
        ,content: 'MAddStu.php' //弹出的页面 
        ,shadeClose: true //点击遮罩关闭 
      });
    }else if(obj.event==='datail'){
      layer.confirm(data.ID);
    }
  });
});

    </script>
</body>
</html>