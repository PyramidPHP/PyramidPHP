<?php declare(strict_types=1);


namespace PyramidPHP\Interests;


interface SpecificInterests
{
    public function getRestrictions() : array;
}