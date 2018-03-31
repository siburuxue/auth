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
        echo $url;
        header("Location: ".$url);
    }

    public function getInfo($args)
    {
        echo json_encode($args);
    }
}