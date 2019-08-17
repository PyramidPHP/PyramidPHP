<?php

namespace PyramidsPHP\Wisdom\AboutBlock;


class Name
{
    /** @var string $vendor */
    private $vendor;
    
    
    /** @var string $package */
    private $package;
    
    
    
    public function __construct(string $vendor, string $package)
    {
        $this->vendor = $vendor;
        $this->package = $package;
    }
    
    
    public function getVendor() : string
    {
        return $this->vendor;
    }

    public function getPackage() : string
    {
        return $this->package;
    }

    public function getFullName() : string
    {
        return $this->vendor . "/" . $this->package;
    }
}