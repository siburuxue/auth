<?php
/**
 * Created by PhpStorm.
 * User: 谦离解鼎节
 * Date: 2018/3/29
 * Time: 22:30
 */

namespace ZP;

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

class Factory
{
    private $type;

    private $obj;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function __call($name,$args){
        $this->execute($name,$args);
    }

    public function create(){
        $reflect= new \ReflectionClass($this->type);
        $this->obj = $reflect->getConstants();
        return $this;
    }

    public function execute($name,$args){
        if(empty($args)){
            $this->obj->invoke($name);
        }else{
            $this->obj->invokeArgs($name,[$args]);
        }
    }
}