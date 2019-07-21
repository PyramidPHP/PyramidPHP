<?php


namespace PyramidsPHP\Wisdom\Interests;


class Integration extends Interests
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
                "ROLE" => 'INTEGRATION',
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
                "NAME" => '$name',
                "LOCALITY" => '$locality'
            ]
        ]
    ];
    
}