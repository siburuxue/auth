<?php
require('Factory.php');
use ZP\Factory;
$factory = new Factory($_REQUEST['state']);
$rs = $factory->create()->getInfo($_REQUEST);
echo json_encode($rs);
