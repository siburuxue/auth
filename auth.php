<?php
$config = require_once("config.php");
$url = "https://github.com/login/oauth/authorize";
$auth_redirect = "http://auth.siburuxue.com/auth_callback.php";
$scope = "scope";
$state = time();
$allow_signup = true;
$url = $url."?client_id=".$config['github']['app_id']."&redirect_uri=".urlencode($auth_redirect)."&scope=".$scope."&state=".$state."&allow_signup=".$allow_signup;
header("Location: ".$url);