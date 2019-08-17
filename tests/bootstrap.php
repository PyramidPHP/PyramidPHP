<?php

define("ROOT_DIR", __DIR__ . "/..");

require_once(ROOT_DIR . "/autoloader.php");

// autoloader
$autoloader = new Paulyg\Autoloader();
$autoloader->addPsr4('PyramidsPHP', ROOT_DIR . "/src");
$autoloader->addPsr4('PyramidsPHP\Tests', __DIR__);

// unit configuration
require_once(__DIR__ . "/Unit/config_tests_unit.php");
