<?php

namespace PyramidsPHP\Manuscripts;


class Packagist implements Manuscript
{
    
    const SOURCE_PATTERN = "https://packagist.org/packages/[vendor]/[package].json";
    
    
    public function readAbout($stone)
    {
        $index = $this->getIndexOf($stone);
        $text = file_get_contents($index);
        return json_decode($text);
    }

    
    private function getIndexOf($stone)
    {
        str_replace(['[vendor]', '[package]'], [$stone->vendor, $stone->package], self::SOURCE_PATTERN);
    }
    
    
    public function readEverythingAbout($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutGenerationsOf($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readWhoIsMaintainerOf($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutDemandFor($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutIntegralBlocksOf($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutMaintenanceBlocksOf($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutAdditiveBlocksOf($block) : Lore
    {
        return new Lore();
    }
    
    public function readAboutAllMentionedBlocksFor($block) : Lore
    {
        return new Lore();
    }
    
    
    public function readAboutQuarriesSupplying($block) : Lore
    {
        return new Lore();
    }
}