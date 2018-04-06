<?php
namespace ZP;

require_once "Auth.php";
use ZP\Auth;
class Weibo extends Auth
{
    public function send(){
        $url = $this->config['Weibo']['auth_url']."?client_id=".$this->config['Weibo']['app_id']."&redirect_uri=".urlencode($this->config['Weibo']['auth_callback'])."&scope=&state=Weibo&display=wap";
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        $code = $args['code'];
        $url = $this->config['Weibo']['token_url']."?client_id=".$this->config['Weibo']['app_id']."&client_secret=".$this->config['Weibo']['app_secret']."&code=".$code."&redirect_uri=".urlencode($this->config['Weibo']['auth_callback'])."&state=Weibo&grant_type=authorization_code";
        $data = $this->curl_get($url);
        echo $data;exit;
        $data = json_decode($data,true);
        $token = $data['access_token'];
        $user_info = $this->config['Weibo']['user_url'].$token;
        $rs = $this->curl_get($user_info);
        return json_decode($rs);
    }
}