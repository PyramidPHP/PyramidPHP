<?php

namespace Unit\Translator;

use PyramidPHP\Manuscripts\Translators\PackagistTranslator;
use PHPUnit\Framework\TestCase;

class PackagistTranslatorTest extends TestCase
{

    private $translator;

    private $mockedPackagistData;


    protected function setUp()
    {
        // setup mock data
        $mockPackagistIndex = TEST_CONFIG['PACKAGIST_MOCK_INDEX_PATTERN'];
        $mockMonologIndex   = str_replace(['{vendor}', '{package}'], ['monolog', 'monolog'], $mockPackagistIndex);
        $mockPhpunitIndex   = str_replace(['{vendor}', '{package}'], ['phpunit', 'phpunit'], $mockPackagistIndex);

        $this->mockedPackagistData['monolog'] = json_decode(
                                                    file_get_contents($mockMonologIndex),
                                            true
                                                );
        $this->mockedPackagistData['phpunit'] = json_decode(
                                                    file_get_contents($mockMonologIndex),
                                            true
                                                );

        //setup instance of translator
        $this->translator = new PackagistTranslator();
    }


    public function test_spellOutVendorName_giveCorrectPackagistData_getVendorName()
    {
        $expected   = "monolog";
        $actual     = $this->translator->spellOutVendorName($this->mockedPackagistData['monolog']);

        $this->assertEquals($expected, $actual);

    }




//    public function test_translate_giveCorrectPackagistData_getTranslatedKnowledge()
//    {
//        $mockedPackagistReadInfo =  json_decode(
//                                        file_get_contents(__DIR__ . "/../mocking_data/Manuscripts/Packagist/api_mock_data_for_monolog_monolog.json"),
//                                  true
//                                    );
//
//
//
//
//
//        $packagistTranslator = new PackagistTranslator();
//        $
//    }

}
