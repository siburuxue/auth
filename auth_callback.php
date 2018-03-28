<?php
$config = require_once("config.php");
if($_REQUEST['state'] == 'code'){
    $code = $_REQUEST['code'];
    $url = "POST https://github.com/login/oauth/access_token";
    $redirect_uri = "http://auth.siburuxue.com/auth_callback.php";
    $url = $url."?client_id=".$config['github']['app_id']."&client_secret=".$config['github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($redirect_uri)."&state=token";
    header("Location:".$url);
}else if($_REQUEST['state'] == 'token'){
    echo json_encode($_REQUEST);
}