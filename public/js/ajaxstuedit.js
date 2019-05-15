function stueditSublimBefore(){
    function AsyscGetMenu(){
        var getMenu = document.getElementById("getMenu");
      var putInfo = document.getElementById("putInfo");
          // var con = this.value;
          //创建XHR对象
          var xhr = new XMLHttpRequest();
          //设置请求URL
        var url = "../ajax/ajaxClassMenu.php";
          //设置XHR对象readyState变化时响应函数
          xhr.onreadystatechange = function () {
              //readyState是请求的状态，为4表示请求结束
              if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 304)) {
                  //responseText服务器响应的内容
                  var JSONData = eval(this.responseText);
                  var str="";
                  for(var ix in JSONData) {
                      str += "<option value='" + JSONData[ix] + "'>" + JSONData[ix] + "</option>";
                  }
                  getMenu.innerHTML += str;
              }
          };
      //打开链接
          xhr.open("post",url,!0);
          //发送请求
          xhr.send(null);
       
      
      }
}