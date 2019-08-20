<?php declare(strict_types=1);


namespace Knowledge;




use PyramidPHP\Interests\SpecificInterests;
use PyramidPHP\Knowledge\Knowledge;

class KnowledgeFilter
{


    private $knowledge;

    private $specificInterests;


    public function __construct(Knowledge $knowledge, SpecificInterests $specificInterests)
    {
        $this->knowledge = $knowledge;
        $this->specificInterests = $specificInterests;
    }






}



























