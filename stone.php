<?php

namespace PyramidPHP;


class Stone extends \Thread
{
    
    public $vendor;
    
    public $package;
    
    
    
    public function __construct($vendor, $package)
    {
        $this->vendor = $vendor;
        $this->package = $package;
    }
}