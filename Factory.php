<?php
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
        try{
            $reflect= new \ReflectionClass($this->type);
            var_dump($reflect);
            $this->obj = $reflect->getConstants();
            return $this;
        }catch (\Exception $e){
            var_dump($e);
        }finally{
            return $this;
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