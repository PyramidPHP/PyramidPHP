<?php

namespace PyramidPHP\Tests\Unit\Manuscripts;

use PHPUnit\Framework\TestCase;

use PyramidPHP\Manuscripts\Packagist;
use PyramidPHP\Knowledge\AboutBlock\Name;
use PyramidPHP\Interests\AboutBlock\IntegrationInterests;


class PackagistTest extends TestCase
{

    /** @var array */
    private $testConfig;
    /** @var Packagist */
    private $packagist;
    
    protected function setUp() : void
    {
        $this->testConfig = TEST_CONFIG;
        $this->packagist = new Packagist($this->testConfig['PACKAGIST_MOCK_INDEX_PATTERN']);
    }



    /**
     * @dataProvider provide_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutPackageRegardingToProvidedInterests
     */
    public function test_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutPackageRegardingToProvidedInterests(array $input, array $expected)
    {
        $result = $this->packagist->readAbout( $input['blockName'], $input['interests'] );
        $this->assertEquals($expected, $result);
    }




    // ----------------------- PROVIDERS ----------------------- //


    public function provide_readAbout_providedValidBlockNameAndInterests_gotCorrectInfoFromPackagistAboutPackageRegardingToProvidedInterests()
    {
        return
        [
            [
                'input' =>
                [
                    'blockName' => new Name('monolog', 'monolog'),
                    'interests' => new IntegrationInterests()
                ],
                'expected' =>
                [

                ]
            ]
        ];

    }


}
