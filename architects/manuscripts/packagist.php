<?php

namespace PyramidPHP\Architects\Manuscripts;


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
}