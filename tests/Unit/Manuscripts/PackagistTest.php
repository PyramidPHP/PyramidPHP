<?php

namespace PyramidsPHP\Tests\Unit\Manuscripts;

use PHPUnit\Framework\TestCase;

use PyramidsPHP\Manuscripts\Packagist;
use PyramidsPHP\Wisdom\AboutBlock\Name;
use PyramidsPHP\Interests\Block\BlockInterestOptions;


class PackagistTest extends TestCase
{

    /**
     * @var Packagist $packagist
     */
    private $packagist;
    
    protected function setUp() : void
    {
        $this->packagist = new Packagist(PACKAGIST_MOCK_INDEX_PATTERN);
    }



    /**
     * @dataProvider provide_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutProvidedExistingPackageRegardingToProvidedAvailableInterests
     */
    public function test_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutProvidedExistingPackageRegardingToProvidedAvailableInterests(array $input, array $expected)
    {
        $result = $this->packagist->readAbout( $input['blockName'], $input['interests'] );
        $this->assertEquals($expected, $result);
    }




    // ----------------------- PROVIDERS ----------------------- //


    public function provide_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutProvidedExistingPackageRegardingToProvidedAvailableInterests()
    {
        return
        [
            [
                'input' =>
                [
                    'blockName' => new Name('monolog', 'monolog'),
                    'interests' => BlockInterestOptions::INTEGRATION
                ],
                'expected' =>
                [

                ]
            ]
        ];

    }


}
