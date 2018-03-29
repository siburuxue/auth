<?php
namespace ZP;
abstract class Auth{

    protected $config;

    public function __construct()
    {
        $this->config = require_once('config.php');
    }

    abstract public function send();

    abstract public function getInfo($data);

    protected function curl_get($url,$header=[]){
        $curl = curl_init();
        if(!empty($header)){
            curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        curl_close($curl);
        return $data;
    }
}