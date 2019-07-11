<?php

namespace PyramidsPHP\Architects;


class Architect extends \Thread
{
    
    protected $plans;
    
    protected $sketches;
    
    protected $manuscripts;




    public function providePlan($pyramid)
    {
        $this->havingPlanFor($pyramid) OR $this->makePlanFor($pyramid);
        
        return $this->givePlanFor($pyramid);
    }
    
    
    
    
    
    protected function havingPlanFor($pyramid)
    {
        return !empty($this->plans);
    }
    
    
    protected function makePlanFor($pyramid)
    {
        $this->learnAbout($pyramid);
        
        
        
        
    }
    
    
    
    protected function learnAbout($pyramid)
    {
        $this->manuscripts->readAbout($pyramid);
        
    }






    protected function givePlanFor($pyramid)
    {
        return $this->plans[$pyramid];
    }
    
    
    
    
    
    public function __construct($manuscripts)
    {
        $this->manuscripts = $manuscripts;
    }
}

