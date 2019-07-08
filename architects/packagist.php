<?php

namespace PyramidPHP\Architects;


class Packagist extends \Thread implements Architect
{
    
    private $plans;
    
    
    public function providePlan($pyramid)
    {
        return $this->makePlanFor($pyramid);
    }
    
}