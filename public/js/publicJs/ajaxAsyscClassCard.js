function AsyscClassCard(url) {
    var ShowClassCard = document.getElementsByClassName("ShowClassCard"),
        xhr = new XMLHttpRequest;
    xhr.onreadystatechange = function () {
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
            ShowClassCard[0].innerHTML = "正在拼命解析数据...";
                if ( 4 == xhr.readyState && (200 === xhr.status || 304 === xhr.status)) {
                    ShowClassCard[0].innerHTML = " ";
                    var jsonDATA = eval(this.responseText);
                    for (var ix in console.log(jsonDATA), jsonDATA) {
                        var ShowHeat = jsonDATA[ix].selected + 20,
                            timestr = jsonDATA[ix].time1,
                            ShowUnerway = timestr.substring(5, 21),
                            ShowClassCardAutoStr = '<div class="recipe-card"><aside><div style="background-image:url(' + jsonDATA[ix].logoSource + ');height: 200px;background-size: cover;"></div><a href="#" class="button"><span class="icon icon-play"></span></a></aside><article><h2>' + jsonDATA[ix].title + '</h2><ul><li><span class="icon icon-users"></span><span>' + jsonDATA[ix].author + '</span></li><li><span class="icon icon-clock"></span><span>' + jsonDATA[ix].classHour + '</span></li><li><span class="icon icon-level"></span><span>正在进行:<a>' + ShowUnerway + '</a></span></li><li><span class="icon icon-calories"></span><span>' + ShowHeat + "</span></li></ul><p>简介：" + jsonDATA[ix].miaoshu + '</p><p class="ingredients"><span>开课前准备:&nbsp;</span>' + jsonDATA[ix].preparation + "</p></article></div>";
                        ShowClassCard[0].innerHTML += ShowClassCardAutoStr
                    }
                }
        }
    }, xhr.open("post", url, !0), xhr.send(null)
}