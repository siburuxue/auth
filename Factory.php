<?php
/**
 * Created by PhpStorm.
 * User: 谦离解鼎节
 * Date: 2018/3/29
 * Time: 22:30
 */

namespace ZP;


class Factory
{
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function create(){
        return new $this->type();
    }
}