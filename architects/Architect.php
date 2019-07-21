<?php

namespace PyramidsPHP\Architects;


class Architect extends \Thread
{
    
    protected $plans;
    
    protected $sketches;
    
    protected $manuscripts;
    
    protected $interests;
    
    protected $wisdom;
    
    protected $specialization = "INTEGRATION";




    public function providePlanFor($pyramid)
    {
        $this->havingPlanFor($pyramid) OR $this->makePlanFor($pyramid);
        
        return $this->givePlanFor($pyramid);
    }
    
    
    
    
    protected function havingPlanFor($pyramid)
    {
        return !empty($this->plans[$pyramid]);
    }
    
    
    protected function makePlanFor($pyramid)
    {
        $this->learnAboutBlocksFor($pyramid);
        
        
        
        
    }
    
    
    
    protected function learnAbout($pyramid)
    {   
        $memory = $this->manuscripts->readAbout($pyramid, $this->interests);
        
        
        
        
        
        
        
    }






    protected function givePlanFor($pyramid)
    {
        return $this->plans[$pyramid];
    }
    
    
    
    
    
    public function __construct(/*$specialization,*/ $manuscripts)
    {
        //$this->specialization   = $specialization;
        $this->manuscripts      = $manuscripts;
    }
}

