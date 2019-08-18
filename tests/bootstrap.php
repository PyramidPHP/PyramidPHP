<?php

define("ROOT_DIR", __DIR__ . "/..");

require_once(ROOT_DIR . "/dev-tools/vendor/autoload.php");

require_once(ROOT_DIR . "/autoloader.php");

// autoloader
$autoloader = new Paulyg\Autoloader();
$autoloader->addPsr4('PyramidPHP', ROOT_DIR . "/src");
$autoloader->addPsr4('PyramidPHP\Tests', __DIR__);
$autoloader->addPsr4('Codedungeon\PHPUnitPrettyResultPrinter', ROOT_DIR . "/dev-tools/phpunit-pretty-result-printer/src");


// unit configuration
require_once(__DIR__ . "/Unit/config_tests_unit.php");
