<?php
include "../connect/PDOconn.php";
include "../connect/session.php";

/**
 * PHP发送Json对象数据
 *
 * param $url 请求url
 * param $jsonStr 发送的json字符串
 * return array
 */
function http_post_json($url, $jsonStr)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($jsonStr)
        )
    );
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
 
    return array($httpCode, $response);
}

    $username=$_SESSION['username'];
    //用学号去查课程id
    $loginSql="SELECT xuankeID FROM studentxk WHERE xingming='".$username."'";
    //执行sql语句
    $result=$pdo->query($loginSql);
    //将结果输出到row
    $result=$result->fetchAll();
    if(empty($result)) {echo "您尚未选择任何课程!"; die();}
    //提取一列到指定数组并存到jasonData
    $jsonData["xuankeID"]=$xuankeId=array_column($result, 'xuankeID');
    //数组去重
    array_unique($xuankeId);

    //存放课程名字数组
    $classSql="SELECT * FROM lesson";
    $result2=$pdo->query($classSql);
    $classInfoQuery=$result2->fetchAll();
    //提取选课信息
    $jsonData["title"]=array_column($classInfoQuery,"title");
    $jsonData["ID"]=array_column($classInfoQuery,"ID");
    $jsonData["author"]=array_column($classInfoQuery,"author");
    $jsonData["miaoshu"]=array_column($classInfoQuery,"miaoshu");
    $jsonData["neirong1"]=array_column($classInfoQuery,"neirong1");
    $jsonData["neirong2"]=array_column($classInfoQuery,"neirong2");
    $jsonData["neirong3"]=array_column($classInfoQuery,"neirong3");
    $jsonData["neirong4"]=array_column($classInfoQuery,"neirong4");
    $jsonData["time1"]=array_column($classInfoQuery,"time1");
    $jsonData["time2"]=array_column($classInfoQuery,"time2");
    $jsonData["time3"]=array_column($classInfoQuery,"time3");
    $jsonData["time4"]=array_column($classInfoQuery,"time4");
    $jsonData["number"]=array_column($classInfoQuery,"number");
    //存放公告
    $noticeSql="SELECT * FROM notice";
    $result3=$pdo->query($noticeSql);
    $noticeQuery=$result3->fetchAll();
    $noticeLength=count($noticeQuery);
    $jsonData["classid"]=array_column($noticeQuery,"classid");
    $jsonData["classNotice"]=array_column($noticeQuery,"info");
    // //输出对应编号的课程名字
    // foreach ($xuankeId as $key => $value) { //最外层的循环次数最少
    //     // echo $value."</br>";
    //     foreach($classInfoQuery as $test1 =>$test2){
    //         //用$value即学生已选课程去匹配所有课程的id匹配到则输出
    //         if($value==$test2['ID']){
    //             //输出对饮id 数组列下的title即课程名字
    //             echo $test2['title']."</br>"; 
    //             foreach($noticeQuery as $key1 => $value1){
    //                 //用学生s所选课的课程id去匹配公告板课程id
    //                 if($value==$value1['classid']){
    //                     echo "课程公告:".$value1['info']."</br>";
    //                     continue;
    //                 }elseif(($key1+1)==$noticeLength){
    //                     echo "该课程暂无公告"."</br>";
    //                 }
    //                 // if(($key1+1==$noticeLength)&&($value != $value1['classid'])){
    //                 //     echo "该课程暂无公告"."</br>".$noticeLength/":".$key1."</br>";
    //                 // }
    //             }
    //         }//匹配课程名字输出
    //     }
    // }
    // print_r ($jsonData["time1"]);
    //统计获取的课程表的长度并存在对应的数组中
    //echo ("<script>console.log("."""".")</script>");
    //echo "</br>".$jsonData["time1"][1];
    
$url  = "http://132.232.72.185/ChooseClass/page2/ajax/ajaxcheckclass.php";
$data = json_encode($jsonData, JSON_UNESCAPED_UNICODE);
    function http_post_data($url, $data_string) {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Content-Length: ' . strlen($data_string))
        );
        ob_start();
        curl_exec($ch);
        $return_content = ob_get_contents();
        ob_end_clean();

        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return array($return_code, $return_content);
    }

list($return_code, $return_content) = http_post_data($url, $data);
    // json_encode($jsonData, JSON_UNESCAPED_UNICODE);
?> 