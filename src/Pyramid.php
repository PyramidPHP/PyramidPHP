<?php

namespace PyramidPHP;


class Pyramid extends Block
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
