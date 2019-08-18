<?php

namespace PyramidPHP;


use Josantonius\ErrorHandler\ErrorHandler;

class Pharaon
{
    
    
    private $pyramid = [];
    
    
    public function __construct()
    {
        $this->init();
    }
    
    
    
    private function init() : void
    {
        // autoloader init
        require_once(__DIR__ . "/../autoloader.php");
        $autoloader = new Paulyg\Autoloader();
        $autoloader->addPsr0('PyramidPHP', __DIR__);

        // config init
        require_once(__DIR__ . "/config.php");

        //error_handler init
        require_once(__DIR__ . "/../ErrorHandler.php");
        (new \ErrorHandler())->setErrorHandler();

        
    }
    
    
    private function buildPyramid($package)
    {
        
    }
    
}
