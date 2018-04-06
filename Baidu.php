<?php
namespace ZP;

require_once "Auth.php";
use ZP\Auth;
class Baidu extends Auth
{
    public function send(){
        $url = $this->config['Baidu']['auth_url']."?response_type=code&client_id=".$this->config['Baidu']['app_id']."&redirect_uri=".urlencode($this->config['Baidu']['auth_callback'])."&scope=&display=popup&state=Baidu";
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        $code = $args['code'];
        $url = $this->config['Baidu']['token_url']."?grant_type=authorization_code&client_id=".$this->config['Baidu']['app_id']."&client_secret=".$this->config['Baidu']['app_secret']."&code=".$code."&redirect_uri=".urlencode($this->config['Baidu']['auth_callback'])."&state=Baidu";
        $data = $this->curl_get($url);
        $data = json_decode($data,true);
        $token = $data['access_token'];
        $user_info = $this->config['Baidu']['user_url'].$token;
        $rs = $this->curl_get($user_info);
        return json_decode($rs);
    }
}