<?php

namespace PyramidPHP\Knowledge;

use PyramidPHP\Block;
use PyramidPHP\Manuscripts\Manuscripts;


class Knowledge
{
    
    private $memory = [];
    
            
    public function about($topic) : ?array
    {
        return $this->memory;
    }
    
    public function aquiredFrom() : Manuscripts
    {
        
    }
    
    public function whenAquired() : \DateTimeImmutable
    {
        
    }
    
    public function reconsiderActuality()
    {
        
    }
    
    
}



