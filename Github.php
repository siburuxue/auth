<?php
/**
 * Created by PhpStorm.
 * User: 谦离解鼎节
 * Date: 2018/3/29
 * Time: 22:14
 */

namespace ZP;

class Github extends Auth
{
    public function send(){
        $scope = "scope";
        $state = 'Github';
        $allow_signup = true;
        $url = $this->config['Github']['auth_url']."?client_id=".$this->config['Github']['app_id']."&redirect_uri=".urlencode($this->config['Github']['auth_callback'])."&scope=".$scope."&state=".$state."&allow_signup=".$allow_signup;
        header("Location: ".$url);
    }

    public function getInfo($data)
    {
        $code = $_REQUEST['code'];
        $url = $this->config['Github']['token_url']."?client_id=".$this->config['Github']['app_id']."&client_secret=".$this->config['Github']['app_secret']."&code=".$code."&redirect_uri=".urlencode($this->config['Github']['auth_callback'])."&state=token";
        $header = ['Accept:application/json'];
        $data = curl_get($url,$header);
        $data = json_decode($data,true);
        $token = $data['access_token'];
        $user_info = $this->config['Github']['user_url'].$token;
        $header = ['User-Agent:qlxdj'];
        $rs = curl_get($user_info,$header);
        return json_decode($rs);
    }
}