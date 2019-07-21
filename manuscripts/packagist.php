<?php

namespace PyramidsPHP\Manuscripts;


//use PyramidsPHP\Wisdom;
//use PyramidsPHP\Wisdom\Wisdom;
//use PyramidsPHP\Wisdom\Block;
//use PyramidsPHP\Wisdom\Block\Name;
//use PyramidsPHP\Wisdom\Block\Interests\Interests;




class Packagist //implements Manuscript
{
    
    const INDEX = "https://packagist.org/packages/{vendor}/{package}.json";
    
    public $interestsMap;
    

    public function readAbout(Name $blockName, Interests $interests)// : Wisdom
    {
        $index = $this->getIndexOf($blockName);
        $contentRaw = file_get_contents($index);
        $content    = json_decode($contentRaw, /*assoc*/ true);
        
        $interesting = $this->filterInterestingTopics($content, $interests);
        
        $test = 'test';
        
        //return new Wisdom();
        
    }
    
    
    private function getIndexOf(Name $blockName) : string
    {
        return str_replace(['{vendor}', '{package}'], [$blockName->getVendor(), $blockName->getPackage()], self::INDEX);
    }
    
    
    
    public function __get(string $nestedKeys)
    {
        $nestedKeys = explode(',', $nestedKeys);
        $prop = $this->interestsMap;

        foreach ($nestedKeys as $key) {
            try {
                $prop = $prop{$key};
            }
            catch(\Error $e) {
                throw new \Exception("Property in interestsMap does not exists \n");
            }
        }
        return $prop;
    }
    
    
    
    /**
     * 
     * @param array $content
     * @param Interests $interests
     * @throws Exceptions\UndefinedInterestMapping
     * @return array
     */
    private function filterInterestingTopics(array $data, Interests $interests) : array
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
    
    
    
    public function __construct()
    {   
        // with ARRAY_AS_PROPS flag passed
        $this->interestsMap = new \ArrayObject(
        [
            "NAME" =>
            [
                "VENDOR" => function($data){
                    $el = $data['package']['name'];
                    return substr($el, 0, 
                        strpos($el, "/")
                    );
                },
                "PACKAGE" => function($data){
                    $el = $data['package']['name'];
                    return substr($el, 
                        strpos($el, "/") + 1
                    );
                }
            ],
                    
            "VERSIONS" => function($data){
                return array_keys($data['package']['versions']);
            },
                    
            "UNDER_BLOCKS" => function($data){
                $underBlocks = [];
                foreach ($data['package']['versions'] as $versionFor => $versionData) {
                    foreach ($versionData['require'] as $name => $recommended) {
                        $underBlocks[$name] ?? $underBlocks[$name] = [];
                        $same = array_filter($underBlocks[$name], function($servingConf){
                            return $servingConf['recommended'] === $recommended;
                        });
                        if (1 === count($same)) {
                            $underBlocks[$name][key($same)]['serving_for'][] = $versionFor;
                            continue;
                        }
                        $underBlocks[$name][] = [
                            'serving_for' => $versionFor,
                            'recommended' => $recommended
                        ];
                    }
                }
                return $underBlocks;
            },
                    
            "QUARRIES" => function($data){
                $quarries = [];
                foreach ($data['package']['versions'] as $versionFor => $versionData) {
                    $quarries[] = [
                        'serving_for' => $versionFor,
                        'type'  => $versionData['source']['type'],
                        'url'   => $versionData['source']['url'],
                        'commit'=> $versionData['source']['reference'],
                    ];
                }
                return $quarries;
            }
        ]);
    }
    
}



class Interests extends \ArrayObject
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
    
    
    public function __construct()
    {
        parent::__construct(self::TOPICS);
    }
    
    
    public function __get(string $nestedKeys)
    {
        $nestedKeys = explode(',', $nestedKeys);
        $prop = $this;

        foreach ($nestedKeys as $key) {
            try {
                $prop = $prop{$key};
            }
            catch(\Error $e) {
                throw new \Exception("Property in ${__CLASS__} does not exists \n");
            }
        }
        return $prop;
    }
    
    public function __set(string $nestedKeys, $value)
    {
        $nestedKeys = explode(',', $nestedKeys);
        $prop = $this;

        foreach ($nestedKeys as $key) {
            try {
                $prop = &$prop{$key};
            }
            catch(\Error $e) {
                throw new \Exception("Property in ${__CLASS__} does not exists \n");
            }
        }
        $prop = $value;
    }
}



class Name
{
    /** @var string $vendor */
    private $vendor;
    
    
    /** @var string $package */
    private $package;
    
    
    
    public function __construct(string $vendor, string $package)
    {
        $this->vendor = $vendor;
        $this->package = $package;
    }
    
    
    public function getVendor() : string
    {
        return $this->vendor;
    }

    public function getPackage() : string
    {
        return $this->package;
    }

    public function getFullName() : string
    {
        return $this->vendor . "/" . $this->package;
    }
}



    
    $packagist = new Packagist();
    $monologName = new Name('monolog', 'monolog');
    $intgrationInterests = new Interests();
    
    
    
    $makeTests = $packagist->readAbout($monologName, $intgrationInterests);
    
    
    
   