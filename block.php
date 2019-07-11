<?php

namespace PyramidsPHP;


class Block extends \Thread
{
    
    public $vendor;
    
    public $package;
    
    
    
    public function __construct($vendor, $package)
    {
        $this->vendor = $vendor;
        $this->package = $package;
    }
}