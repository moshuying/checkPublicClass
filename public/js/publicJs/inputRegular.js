//Add onblur="" to inputBox
function inputFigure(num,maxlimit){
    var usernameOut=document.getElementsByClassName("usernameOut");
    console.log(usernameOut[0]);
    if(num.value.length> maxlimit){
        usernameOut.innerHTML="超过账号输入上限";
    }else{
        num.value=maxlimit-num.value.length;
    }
    
}
function inputNotice(){
    var getNotice=document.getElementById("getNotice")[0];
    var noticeFull=document.getElementById("noticeFull")[0];
    while(1){
    console.log(getNotice);
    if(getNotice.value.length>250){
        noticeFull.innerHTML="您的输入字符已经超过上限";
    }else{
        noticeFull.innerHTML="还剩"+(250-getNotice.value.length)+"字可以输入";
    }
    }
}