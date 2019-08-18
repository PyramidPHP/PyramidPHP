<?php

namespace PyramidPHP;


class Block extends \Thread
{
    
    private $vendor;
    
    private $package;
    
    
    
    public function __construct($vendor, $package)
    {
        $this->vendor = $vendor;
        $this->package = $package;
    }
    
    
}