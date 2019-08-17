<?php

namespace PyramidsPHP\Manuscripts;


use PyramidsPHP\Wisdom\AboutBlock\Name;
use PyramidsPHP\Interests\Block\BlockInterestOptions as Interests;

use PyramidsPHP\Manuscripts\Translators\Translator;




class Packagist //implements Manuscript
{


    private $indexPattern;


    public function __construct(string $indexPattern)
    {
        $this->indexPattern = $indexPattern;
    }


    public function readAbout(Name $blockName, array $interests = Interests::ALL ) // : Wisdom
    {
        if (!Interests::providedOptionExists($interests)) {
            throw new \Exception("Interests option passed into ".__CLASS__ ."::".__METHOD__." is not defined in class enum " . Interests::class . "\n" . "Interests passed is: \n" . print_r($interests) );
        }

        $index      = $this->getIndexOf($blockName);
        $contentRaw = file_get_contents($index);
        $content    = json_decode($contentRaw, /*assoc*/ true);


        $interesting = $this->filterInterestingTopics($content, $interests);
        
        //return new Wisdom();
    }
    
    
    private function getIndexOf(Name $blockName) : string
    {
        return str_replace(['{vendor}', '{package}'], [$blockName->getVendor(), $blockName->getPackage()], $this->indexPattern);
    }


    private function translateContentIntoWisdom(array $content) : array
    {
        $translator = new Translator(self::TRANSLATION_RULES);




    }




    /**
     * @param array $content
     * @param Interests $interests
     * @throws Exceptions\UndefinedInterestMapping
     * @return array
     */
    private function filterInterestingTopics(array $data, string $interests) : array
    {
        $iterator = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($interests), \RecursiveIteratorIterator::SELF_FIRST);

        $lastDepth = -1;
        $actualDepthKeys = [];

        foreach ($iterator as $key => $value) {

            if ($iterator->getDepth() > $lastDepth) {
                $lastDepth = $iterator->getDepth();
                $actualDepthKeys[] = $key;
            }
            elseif ($iterator->getDepth() < $lastDepth) {
                $lastDepth = $iterator->getDepth();
                array_pop($actualDepthKeys);
                array_pop($actualDepthKeys);
                $actualDepthKeys[] = $key;
            }
            else {
                array_pop($actualDepthKeys);
                $actualDepthKeys[] = $key;
            }


            $strDepthKeys = implode(',', $actualDepthKeys);
            if( is_callable($this->{$strDepthKeys}) ) {
                $interests->{$strDepthKeys} = ($this->{$strDepthKeys})($data);
            }

        }

        return $interests->getArrayCopy();
    }




/*
     _____                     _         _    _                ______         _
    |_   _|                   | |       | |  (_)               | ___ \       | |
      | |    __ _  _ __   ___ | |  __ _ | |_  _   ___   _ __   | |_/ / _   _ | |  ___  ___
      | |   / _` || '_ \ / __|| | / _` || __|| | / _ \ | '_ \  |    / | | | || | / _ \/ __|
      | |  | (_| || | | |\__ \| || (_| || |_ | || (_) || | | | | |\ \ | |_| || ||  __/\__ \
      \_/   \__,_||_| |_||___/|_| \__,_| \__||_| \___/ |_| |_| \_| \_| \__,_||_| \___||___/
*/


    private $NameVendor = '';

    private $NamePackage = '';

    private $Versions = [];

    private $UnderBlocks = [];

    private $Quarries = [];


    const TRANSLATION_RULES =
        [
            "NAME" =>
                [
                    "VENDOR" => '$this->NameVendor()',

                    "PACKAGE" => '$this->NamePackage()'
                ],

            "VERSIONS" => '$this->Versions()',

            "UNDER_BLOCKS" => '$this->UnderBlocks()',

            "QUARRIES" => '$this->Quarries()'
        ];




    private function NameVendor(array $data) : void
    {
        $el = $data['package']['name'];

        $this->NameVendor = substr($el, 0,
            strpos($el, "/")
        );
    }


    private function NamePackage(array $data) : void
    {
        $el = $data['package']['name'];

        $this->NamePackage = substr($el,
            strpos($el, "/") + 1
        );
    }


    private function Versions(array $data) : void
    {
        $this->Versions = array_keys($data['package']['versions']);
    }


    private function UnderBlocks(array $data) : void
    {
        foreach ($data['package']['versions'] as $versionFor => $servingData) {
            if ( !empty($servingData['require']) ) {
                $this->resolveUnderBlockServingSection($versionFor, $servingData['require']);
            }
        }
    }


    private function resolveUnderBlockServingSection(string $versionFor, array $servingList) : void
    {
        foreach ($servingList as $name => $recommended) {

            $this->UnderBlocks[$name] ?? $this->UnderBlocks[$name] = [];

            $servingSection = $this->filterOut_underBlockServingSection_withSameRecommendedSection($name, $recommended);

            if (1 > count($servingSection)) {
                throw new \Exception('Incorrect underBlock serving section state encountered during translations');
            }

            if (1 === count($servingSection)) {
                $this->UnderBlocks[$name][key($servingSection)]['serving_for'][] = $versionFor;
                continue;
            }

            $this->UnderBlocks[$name][] = [
                'serving_for' => $versionFor,
                'recommended' => $recommended
            ];
        }

    }


    private function filterOut_underBlockServingConfig_withSameRecommendedSection(string $name, string $recommended) : array
    {
        return array_filter($this->UnderBlocks[$name], function($servingSection) use ($recommended) {
            return $servingSection['recommended'] === $recommended;
        });
    }



    private function Quarries(array $data) : void
    {
        foreach ($data['package']['versions'] as $versionFor => $versionData) {
            $this->Quarries[] = [
                'serving_for' => $versionFor,
                'type'  => $versionData['source']['type'],
                'url'   => $versionData['source']['url'],
                'commit'=> $versionData['source']['reference'],
            ];
        }
    }






}