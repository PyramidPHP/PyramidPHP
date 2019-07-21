<?php


namespace PyramidsPHP\Wisdom\Interests;


class All
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
                "SERVING_FOR" => ['[version]'],
                "REGION" => '$region',
                "LOCALITY" => '$locality'
            ]
        ]
    ]; 
}