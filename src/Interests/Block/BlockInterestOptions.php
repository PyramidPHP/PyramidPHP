<?php

namespace PyramidsPHP\Interests\Block;


use PyramidsPHP\Interests\InterestOptions;


class BlockInterestOptions extends InterestOptions
{

    const   ALL =
            [
                'OPTION_NAME' => 'ALL',
                'RESTRICTIONS' => []
            ],

            INTEGRATION =
            [
                'OPTION_NAME' => 'INTEGRATION',
                'RESTRICTIONS' =>
                [
                    'UNDER_BLOCK_ROLE' => ['FUNDATION']
                ]
            ];


}