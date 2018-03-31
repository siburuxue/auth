<?php
namespace ZP;

require_once "Auth.php";
use ZP\Auth;
class Github extends Auth
{
    public function send(){
        $scope = "scope";
        $state = 'Github';
        $allow_signup = true;
        $url = $this->config['Github']['auth_url']."?client_id=".$this->config['Github']['app_id']."&redirect_uri=".urlencode($this->config['Github']['auth_callback'])."&scope=".$scope."&state=".$state."&allow_signup=".$allow_signup;
        echo $url;
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        $code = $args['code'];
        $url = $this->config['Github']['token_url']."?client_id=".$this->config['Github']['app_id']."&client_secret=".$this->config['Github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($this->config['Github']['auth_callback'])."&state=Github";
        $header = ['Accept:application/json'];
        $data = $this->curl_get($url,$header);
        $data = json_decode($data,true);
        $token = $data['access_token'];
        $user_info = $this->config['Github']['user_url'].$token;
        $header = ['User-Agent:qlxdj'];
        $rs = $this->curl_get($user_info,$header);
        echo $rs;exit;
        return json_decode($rs);
    }
}