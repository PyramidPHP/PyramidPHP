<?php

namespace PyramidPHP;



class Pyramid extends Stone
{
    
    private $stones         = [];
    private $name           = '';
    private $pyramidPlan    = '';

    
    
    public function build()
    {
        $this->start();
    }
    
    
    public function run()
    {
        $this->pyramidPlan = $this->architect->providePlan();
        
        
    }
    
}
