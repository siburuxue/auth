<?php
namespace ZP;

spl_autoload_register(function ($name){
    require_once $name.".php";
});

class Factory
{
    private $type;

    private $obj;

    public function __construct($type)
    {
        $this->type = "ZP\\".$type;
    }

    public function __call($name,$args){
        $this->execute($name,$args);
    }

    public function create(){
        try{
            $reflect= new \ReflectionClass(new \ZP\Github());
            $this->obj = $reflect->getConstants();
            var_dump($this->obj);
            return $this;
        }catch (\Exception $e){
            var_dump($e);
        }
    }

    public function execute($name,$args){
        if(empty($args)){
            $this->obj->invoke($name);
        }else{
            $this->obj->invokeArgs($name,[$args]);
        }
    }
}