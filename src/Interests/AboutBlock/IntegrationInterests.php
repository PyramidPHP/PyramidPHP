<?php declare(strict_types=1);


namespace PyramidPHP\Interests\AboutBlock;


use PyramidPHP\Interests\SpecificInterests;


class IntegrationInterests extends Interests implements SpecificInterests
{

    const RESTRICTIONS =
        [
            'UNDER_BLOCK_ROLE' => ['FUNDATION']
        ];


    public function getRestrictions(): array
    {
        return self::RESTRICTIONS;
    }


}