<?php
require('Factory.php');
use ZP\Factory;
$factory = new Factory($_REQUEST['state']);
$rs = $factory->create()->getInfo();
echo json_encode($rs);
