<?php

namespace PyramidsPHP\Wisdom;

use PyramidsPHP\Block;
use PyramidsPHP\Manuscripts\Manuscripts;


class BlockWisdom extends Wisdom
{
    /* @var Identity $identity */
    public $identity;
    
    
    
    
    
    
    
}


class Identity
{
    /** @var string $vendor */
    public $vendor;
    
    
    /** @var string $package */
    public $package;
}


class Versions
{
    /** @var Version[] $version */
    public $versions;
}


class Version
{
    /* @var string $data */
    public $data;
}



class UnderBlock
{
    /** @var BlockIdentity $blockIdentity */
    public $blockIdentity;
    
    /** @var UnderBlockRole $blockIdentity */
    public $role;
    
    /** @var ServingVersions $blockIdentity */
    public $servingVersions;
}




class ServingVersions
{
    /** @var ServingVersion[] $servingVersions */ 
    public $servingVersion;
}



class ServingVersion
{
    /* @var Versions $servingFor  */
    public $servingFor;
    
    /* @var Versions $srecommended  */
    public $srecommended;
    
    /* @var Versions $srecommended  */
    public $unrecomended;
}


class Quarries
{
    /* @var Quarry[] $quarries */
    public $quarries;
}


class Quarry
{
    /* @var string $region */
    public $region;
    
    /* @var string $locality */
    public $locality;
}





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