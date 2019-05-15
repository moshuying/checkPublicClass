function signIn(title) {
    var url = "../ajax/ajaxstuChooseClass.php";
    var classname = title.innerHTML,
        stuID = stuname = document.getElementsByTagName('a')[0].innerHTML,
        stuname = document.getElementsByTagName('p')[0].innerHTML,
        xhr = new XMLHttpRequest();
    var postInfo = "stuname=" + stuname + "&classname=" + classname + "&stuID=" + stuID;
    xhr.open("POST", url, !0);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(postInfo);
    xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 304)) {
                var jsonDATA = this.responseText;
                console.log(jsonDATA);
                switch (jsonDATA) {
                    case '1':
                        alert(stuname + "加入" + classname + "成功!");
                        break;
                    case '2':
                        alert("当前选课" + classname + "人数已满");
                        break;
                    case '3':
                        alert("管理员未开放选课");
                        break;
                    case '4':
                        alert("您已加入此课程" + classname);
                        break;
                    case '6':
                        console.log("添加课程人数失败");
                        alert("加入课程错误,若多次出现此错误请联系管理员");
                        break;
                    case '7':
                        console.log("添加课程号失败");
                        alert("加入课程错误,若多次出现此错误请联系管理员");
                        break;
                    default:
                        alert("加入课程错误,若多次出现此错误请联系管理员");
                        break;
                }

            }
        }, xhr.timeout = 10000,
        xhr.ontimeout = function () {
            alert("连接超时,请刷重试或刷新页面.");
        };


}