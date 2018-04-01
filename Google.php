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
        echo json_encode($args);
    }
}