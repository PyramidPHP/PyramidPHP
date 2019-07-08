<?php

namespace PyramidPHP;


class Faraon
{
    
    
    private $pyramids = [];
    
    
    public function __construct()
    {
        $this->init();
    }
    
    
    
    private function init() : void
    {
        //autoloader init
        spl_autoload_register(function ($class) {
            $file = str_replace('\\', DIRECTORY_SEPARATOR, lcfirst($class)).'.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
    
    
    private function buildPyramid($package)
    {
        
    }
    
}
