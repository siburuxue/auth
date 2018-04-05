<?php
namespace ZP;

require_once "Auth.php";
use ZP\Auth;
class Google extends Auth
{
    public function send(){
        $state = 'Google';
        $url = $this->config['Google']['auth_url']."?client_id=".$this->config['Google']['app_id']."&redirect_uri=".urlencode($this->config['Google']['auth_callback'])."&scope=".urlencode($this->config['Google']['scope'])."&state=".$state."&response_type=code"."&include_granted_scopes=true"."&access_type=offline";
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        $code = $args['code'];
//        $token_url = $this->config['Google']['token_url']."?code=".$code."&client_id=".$this->config['Google']['app_id']."&client_secret=".$this->config['Google']['app_secret']."&redirect_uri=".urlencode($this->config['Google']['auth_callback'])."&grant_type=authorization_code";
//        $token_rs = $this->curl_get($token_url);
        $token_url = $this->config['Google']['token_url'];
        $data = [
            'code' => $code,
            'client_id' => $this->config['Google']['app_id'],
            'client_secret' => $this->config['Google']['app_secret'],
            'redirect_uri' => urlencode($this->config['Google']['auth_callback']),
            'grant_type' => 'authorization_code',
        ];
        $token_rs = $this->curl_post($token_url,$data);
        echo $token_rs;
    }
}