<?php

namespace PyramidsPHP\Manuscripts;

use PyramidsPHP\Lore\Lore


interface Manuscript
{
    public function readEverythingAbout($block) : Lore;
    
    
    public function readAboutGenerationsOf($block) : Lore;
    
    
    public function readWhoIsMaintainerOf($block) : Lore;
    
    
    public function readAboutDemandFor($block) : Lore;
    
    
    public function readAboutIntegralBlocksOf($block) : Lore;
    
    
    public function readAboutMaintenanceBlocksOf($block) : Lore;
    
    
    public function readAboutAdditiveBlocksOf($block) : Lore;
    
    
    public function readAboutAllMentionedBlocksFor($block) : Lore;
    
    
    public function readAboutQuarriesSupplying($block) : Lore;
    
}