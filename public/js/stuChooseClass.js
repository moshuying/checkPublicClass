function AsyscChoose(url) {
    var ShowClassCard = document.getElementsByClassName("ShowClassCard"),
        xhr = new XMLHttpRequest();
    (xhr.onreadystatechange = function () {
        switch (xhr.readyState) {
            case 1:
                ShowClassCard[0].innerHTML += "异步请求构造成功.已成功调用";
                break;
            case 2:
                ShowClassCard[0].innerHTML += "已获取到响应头和响应状态";
                break;
            case 3:
                ShowClassCard[0].innerHTML = "正在疯狂从服务器抓取数据...";
                break;
            case 4:
                if (
                    ((ShowClassCard[0].innerHTML = "正在拼命解析数据..."),
                    4 == xhr.readyState && (200 === xhr.status || 304 === xhr.status))
                ) {
                    ShowClassCard[0].innerHTML = " ";
                    var jsonDATA = eval(this.responseText);
                    if (jsonDATA.length == 0 || jsonDATA == null) {
                        ShowClassCard[0].innerHTML = '<p style="font-size:2rem;text-align:center;">您尚未选择任何课程<br>点击<a style="color:red;font-size: inherit;" href="./stuChooseClass.php">进入选课</a>加入自己喜欢的课程吧</p>';
                        alert("您尚未选择任何课程");
                    }
                    for (var ix in jsonDATA) {
                        if (jsonDATA[ix].hidden == '1') continue;
                        var ShowHeat = jsonDATA[ix].selected + 20 + jsonDATA[ix].clickOn + 10,
                            timestr = '<span>' + jsonDATA[ix].time1 + '</span><span>' + jsonDATA[ix].time2 + '</span></br>' + '<span>' + jsonDATA[ix].time3 + '</span><span>' + jsonDATA[ix].time4 + '</span>',
                            ShowClassCardAutoStr =
                                '<div class="recipe-card"><aside><div style="background-image:url(' +
                                jsonDATA[ix].logoSource +
                                ');height: 200px;background-size: cover;"></div><p style="cursor: pointer;background:url(\'../public/img/choose.png\') no-repeat ;" onclick="$(\'#jumpClick' + ix + '\').click();" class="button"></p></aside><article><h2 id="jumpClick' + ix + '" onclick="signIn(this)">' +
                                jsonDATA[ix].title +
                                '</h2><ul><li><span class="icon icon-users"></span><span>' +
                                jsonDATA[ix].author +
                                '</span></li><li><span class="icon icon-clock"></span><span>' +
                                jsonDATA[ix].classHour +
                                '</span></li><li><span class="icon icon-calories"></span><span>' +
                                ShowHeat +
                                '</span></li><li><span class="icon icon-level"></span><span>上课时间:</span></li></ul><a style="color:#747474;display: flex;flex-wrap: wrap;">' +
                                timestr + '</a><p>简介：' +
                                jsonDATA[ix].miaoshu +
                                '</p><p class="ingredients"><span>开课前准备:&nbsp;</span>' +
                                jsonDATA[ix].preparation +
                                "</p></article></div>";
                        ShowClassCard[0].innerHTML += ShowClassCardAutoStr;
                    }

                }
        }
    }),
        (xhr.timeout = 3e3),
        (xhr.ontimeout = function () {
            alert("连接超时,请刷重试或刷新页面.");
        }),
        xhr.open("post", url, !0),
        xhr.send(null);
}

function signIn(title) {
    var temp='您确定要加入'+title.innerHTML+'课程么';
    layer.confirm(temp,{
        btn:['确定','取消']
    },function () {
        var url = "../ajax/ajaxstuChooseClass.php";
        var classname = title.innerHTML,
            stuID = document.getElementById('getIdDo').innerHTML,
            stuname = document.getElementById('getnameDo').innerHTML,
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
    },function () {
        layer.msg('取消操作', {
        time: 1000
        })
    })


}