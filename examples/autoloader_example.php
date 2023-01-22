<?php
require "Autoloader.php";
Autoloader::register();

use app\Controllers\baseController;

$object = new baseController();
var_dump($object);