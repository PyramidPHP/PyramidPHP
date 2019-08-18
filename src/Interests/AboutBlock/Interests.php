<?php


namespace PyramidPHP\Interests\AboutBlock;

use PyramidPHP\Interests\Interests as BaseInterests;

class Interests extends BaseInterests
{
    const TOPICS =
    [
        "NAME" =>
        [
            "VENDOR" => '$vendor',
            "PACKAGE" => '$package'
        ],
        "VERSIONS" => '[version]',
        "UNDER_BLOCKS" =>
        [
            '[under_block]' =>
            [
                "NAME" => 
                [
                    "VENDOR" => '$vendor',
                    "PACKAGE" => '$package'
                ],
                "UNDER_BLOCK_ROLE" => ['FUNDATION', 'DEVELOPMENT', 'ADDITION'],
                "SERVING_VERSIONS" =>
                [
                    '[serving_version]' =>
                    [
                        "SERVING_FOR" => '[version]',
                        "RECOMMENDED" => '[version]',
                        "UNRECOMMENDED" => '[version]'
                    ]
                ]
            ]
        ],
        "QUARRIES" => 
        [
            '[quarry]' =>
            [
                "SERVING_FOR" => '[version]',
                "REGION" => '$region',
                "LOCALITY" => '$locality'
            ]
        ]
    ]; 
}