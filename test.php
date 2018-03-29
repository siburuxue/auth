<?php
require('Factory.php');
use ZP\Factory;
$type = $_GET['type'];
$factory = new Factory($type);
$obj = $factory->create();
var_dump($obj);
$factory->create()->send();