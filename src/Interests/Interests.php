<?php declare(strict_types=1);


namespace PyramidsPHP\Interests;


class Interests extends \ArrayObject
{

    const TOPICS = [
        /* schema array of interests */
    ];


    public function __construct()
    {
        parent::__construct(self::TOPICS);
    }
    

    public function __get(string $nestedKeys)
    {
        $nestedKeys = explode(',', $nestedKeys);
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
        $nestedKeys = explode(',', $nestedKeys);
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