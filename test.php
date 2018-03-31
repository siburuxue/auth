<?php
require('Factory.php');
use ZP\Factory;
$type = $_GET['type'];
$factory = new Factory($type);
$factory->create()->send();