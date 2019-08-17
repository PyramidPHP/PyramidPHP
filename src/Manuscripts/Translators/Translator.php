<?php


namespace PyramidsPHP\Manuscripts\Translators;



class Translator extends \ArrayObject
{
    const TRANSLATION_RULES = [
        /* schema array of translations rules */
    ];
    
    
    public function __construct()
    {
        parent::__construct(self::TRANSLATION_RULES);
    }
    
    
    public function __get(string $nestedKeys)
    {
        $nestedKeys = explode('->', $nestedKeys);
        $prop = $this->storage;

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
        $nestedKeys = explode('->', $nestedKeys);
        $prop = $this->storage;

        foreach ($nestedKeys as $key) {
            try {
                $prop = $prop{$key};
            }
            catch(\Error $e) {
                throw new \Exception("Property in ${__CLASS__} does not exists \n");
            }
        }
        $prop = $value;
    }
}
