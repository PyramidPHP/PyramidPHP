<?php

namespace PyramidsPHP;


class Pharaon
{
    
    
    private $pyramids = [];
    
    
    public function __construct()
    {
        $this->init();
    }
    
    
    
    private function init() : void
    {
        // autoloader init
        require_once(__DIR__ . "/../autoloader.php");
        $autoloader = new Paulyg\Autoloader();
        $autoloader->addPsr0('PyramidsPHP', __DIR__);

        // config init
        require_once(__DIR__ . "/config.php");
        
    }
    
    
    private function buildPyramid($package)
    {
        
    }
    
}
