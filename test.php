<?php
require('Factory.php');
use ZP\Factory;
$type = $_GET['type'];
$factory = new Factory($type);
var_dump($factory->create());exit;
$factory->create()->send();