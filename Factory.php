<?php
namespace ZP;

spl_autoload_register(function ($name){
    require_once "$name.php";
});
var_dump(new \ZP\Github());
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
       return $this->obj = new $this->type;
    }

    public function execute($name,$args){
        $reflectionClass = new \ReflectionClass($this->obj);
        if($reflectionClass->hasMethod($name)){
            $reflectionMethod = new \ReflectionMethod($this->obj,$name);
            if($reflectionMethod->isPublic()){
                if($reflectionMethod->isStatic()){
                    $reflectionMethod->invoke(null,$args);
                }else{
                    $reflectionMethod->invoke($this->obj,$args);
                }
            }else{
                throw new \Exception("The function:{$name} is not allowed access");
            }
        }else{
            throw new \Exception("The function:{$name} is not exists");
        }
    }
}