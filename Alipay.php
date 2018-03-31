<?php
/**
 * Created by PhpStorm.
 * User: 谦离解鼎节
 * Date: 2018/3/31
 * Time: 15:08
 */

namespace ZP;

require_once "Auth.php";
use ZP\Auth;

class Alipay extends Auth
{
    public function send(){
        $scope = "auth_user";
        $state = 'Alipay';
        $url = $this->config['Alipay']['auth_url']."?app_id=".$this->config['Alipay']['app_id']."&redirect_uri=".urlencode($this->config['Alipay']['auth_callback'])."&scope=".$scope."&state=".$state;
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        $code = $args['auth_code'];
        $data = [
            'app_id' => $this->config['Alipay']['app_id'],
            'method' => "alipay.system.oauth.token",
            'charset' => "utf-8",
            'sign_type' => "RSA2",
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => "1.0",
            'grant_type' => "authorization_code",
            'code' => $code,
        ];
        ksort($data);
        $str = http_build_query($data);
        openssl_sign($str, $sign, openssl_pkey_get_private($this->config['Alipay']['private_key']),OPENSSL_ALGO_SHA256 );
        $sign = base64_encode($sign);
        $data['sign'] = $sign;
        $param = http_build_query($data);
        $token_url = $this->config['Alipay']['token_url']."?".$param;
        $token_rs = $this->curl_get($token_url);
        echo $token_rs;
    }
}