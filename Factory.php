<?php
namespace ZP;

require_once "Github.php";
use ZP\Github;


class Factory
{
    private $type;

    private $obj;

    public function __construct($type)
    {
        $this->type = "\\ZP\\".$type;
    }

    public function __call($name,$args){
        $this->execute($name,$args);
    }

    public function create(){
        try{
            $reflect= new \ReflectionClass(new Github());
            var_dump($reflect);
            $this->obj = $reflect->getConstants();
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