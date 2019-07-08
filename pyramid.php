<?php

namespace PyramidPHP;



class Pyramid extends \Thread
{
    
    private $stones         = [];
    private $name           = '';
    private $pyramidPlan    = '';
    
    private $architect;
    private $quarries;
    
    
    
    public function __construct($name, $architect, $quarries)
    {
        $this->name      = $name;
        $this->architect = $architect;
        $this->quarries  = $quarries;
    }
    
    
    public function build()
    {
        $this->start();
    }
    
    
    public function run()
    {
        $this->pyramidPlan = $this->architect->providePlan();
        
        
    }
    
}
