<?php
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $url = $url."?client_id=".$config['github']['app_id']."&client_secret=".$config['github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($redirect_uri)."&state=token";
    $header = ['Accept:application/json'];
    $data = curl_get($url,$header);
    echo $data;
}
function curl_get($url,$header=[]){
    $curl = curl_init();
    if(!empty($header)){
        curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
    }
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    curl_close($curl);
    return $data;
}
