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
        $sign = $this->rsaSign($data);
        $data['sign'] = $sign;
        $data = http_build_query($data);
        $token_url = $this->config['Alipay']['gateway']."?".$data;
        $token_rs = $this->curl_get($token_url);
        $token_rs = json_decode($token_rs,true);
        $param = [
            'app_id' => $this->config['Alipay']['app_id'],
            'method' => "alipay.user.info.share",
            'charset' => "utf-8",
            'sign_type' => "RSA2",
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => "1.0",
            'grant_type' => "authorization_code",
            'code' => $code,
            'auth_token' => $token_rs['alipay_system_oauth_token_response']['access_token'],
        ];
        $sign = $this->rsaSign($param);
        $param['sign'] = $sign;
        $param = http_build_query($param);
        $user_url = $this->config['Alipay']['gateway']."?".$param;
        $user_rs = $this->curl_get($user_url);
        return json_decode($user_rs,true);
    }

    public function rsaSign($params) {
        return $this->sign($this->getSignContent($params));
    }

    protected function sign($data) {
        $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($this->config['Alipay']['private_key'], 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        openssl_sign($data, $sign, $res, OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        return $sign;
    }

    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {

                // 转换成目标字符集
                $v = $this->characet($v, "UTF-8");

                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset ($k, $v);
        return $stringToBeSigned;
    }

    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;

        return false;
    }

    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = "UTF-8";
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
            }
        }
        return $data;
    }
}