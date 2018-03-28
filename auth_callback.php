<?php
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $url = $url."?client_id=".$config['github']['app_id']."&client_secret=".$config['github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($redirect_uri)."&state=token";
    header("Accept:application/json");
    header("Location:".$url);
}else if($_REQUEST['state'] == 'token'){
    var_dump(file_get_contents("php://input"));
}
function postCurl($url,$post_data,$headers=[]){
    $ch = curl_init();
    if(!empty($headers)){
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}