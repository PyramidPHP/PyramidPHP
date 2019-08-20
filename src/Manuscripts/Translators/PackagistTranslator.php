<?php


namespace PyramidPHP\Manuscripts\Translators;



class PackagistTranslator extends Translator
{
    
    
    private $NameVendor = '';
    
    private $NamePackage = '';
    
    private $Versions = [];
    
    private $UnderBlocks = [];
    
    private $Quarries = [];
    
    
    const TRANSLATION_RULES = 
    [
        "NAME" =>
        [
            "VENDOR" => '$this->nameVendor()',
            
            "PACKAGE" => '$this->namePackage()'
        ],

        "VERSIONS" => '$this->versions()',

        "UNDER_BLOCKS" => '$this->underBlocks()',

        "QUARRIES" => '$this->quarries()'
    ];
    
    
    
    
    public function spellOutVendorName(array $data) : string
    {
        return substr(
                    $el = $data['package']['name'],
                    0,
                    strpos($el, "/")
                );
    }


    public function namePackage(array $data) : void
    {
        $el = $data['package']['name'];
        
        $this->NamePackage = substr($el, 
            strpos($el, "/") + 1
        );
    }


    public function versions(array $data) : void
    {
        $this->Versions = array_keys($data['package']['versions']);
    }


    public function underBlocks(array $data) : void
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


    public function filterOut_underBlockServingConfig_withSameRecommendedSection(string $name, string $recommended) : array
    {
        return array_filter($this->UnderBlocks[$name], function($servingSection) use ($recommended) {
            return $servingSection['recommended'] === $recommended;
        });
    }



    public function quarries(array $data) : void
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
