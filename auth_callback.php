<?php
echo json_encode($_REQUEST);
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $headers = [
        'Accept: application/json'
    ];
    $data = [
        'client_id' => $config['github']['app_id'],
        'client_secret' => $config['github']['app_secret'],
        'code' => $code,
        'redirect_uri' => urlencode($redirect_uri),
        'state' => "token",
    ];
    $rs = postCurl($url,$data,$headers);
    echo $rs;
}else if($_REQUEST['state'] == 'token'){

}
function postCurl($url,$post_data,$headers=[]){
    $ch = curl_init();
    if(!empty($headers)){
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers);
    }
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}