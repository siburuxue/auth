<?php
namespace ZP;

class Factory
{
    private $type;

    private $obj;

    public function __construct($type)
    {
        $file_name = $type.".php";
        require_once $file_name;
        $this->type = "\\ZP\\".$type;
    }

    public function __call($name,$args){
        return $this->execute($name,$args);
    }

    public function create(){
        $this->obj = new $this->type;
        return $this;
    }

    private function execute($name,$args){
        $reflectionClass = new \ReflectionClass($this->obj);
        if($reflectionClass->hasMethod($name)){
            $reflectionMethod = new \ReflectionMethod($this->obj,$name);
            if($reflectionMethod->isPublic()){
                if($reflectionMethod->isStatic()){
                    return $reflectionMethod->invokeArgs(null,$args);
                }else{
                    return $reflectionMethod->invokeArgs($this->obj,$args);
                }
            }else{
                throw new \Exception("The function:{$name} is not allowed access");
            }
        }else{
            throw new \Exception("The function:{$name} is not exists");
        }
    }
}