<?php
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $url = $url."?client_id=".$config['github']['app_id']."&client_secret=".$config['github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($redirect_uri)."&state=token";
    //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl,CURLOPT_HEADER,['Accept:application/json']);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //执行命令
    $data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    echo $data;
}
