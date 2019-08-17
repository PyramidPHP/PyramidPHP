<?php

namespace PyramidsPHP\Interests;


class InterestOptions
{

    static function providedOptionExists(array $option) : bool
    {
        return !empty(static::$option['OPTION_NAME']);
    }

}