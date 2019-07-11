<?php


namespace PyramidsPHP\Wisdom;

use PyramidsPHP\Block;
use PyramidsPHP\Manuscripts\Manuscripts;



class BlockInterests
{
    const BLOCK_WISDOM =
    [
        "IDENTITY" => 
        [
            "VENDOR" => '$vendor',
            "PACKAGE" => '$package'
        ],
        "VERSIONS" => '[version]',
        "UNDER_BLOCKS" =>
        [
            '[under_block]' =>
            [
                "IDENTITY" => 
                [
                    "VENDOR" => '$vendor',
                    "PACKAGE" => '$package'
                ],
                "ROLE" => '{UNDER_BLOCK_ROLE}',
                "SERVING_VERSIONS" =>
                [
                    '[serving_version]' =>
                    [
                        "SERVING_FOR" => ['[version]'],
                        "RECOMMENDED" => ['[version]'],
                        "UNRECOMMENDED" => ['[version]']
                    ]
                ]
            ]
        ],
        "QUARRIES" => 
        [
            '[quarry]' =>
            [
                "REGION" => '$region',
                "LOCALITY" => '$locality'
            ]
        ]
    ]; 
}