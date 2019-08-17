<?php

namespace PyramidsPHP\Wisdom\AboutBlock;

use PyramidsPHP\Block;


class BlockIntegration extends Wisdom
{
    /** @var Identity $identity */
    private $identity;
    
    /** @var Version[] $versions */
    private $versions;
    
    /** @var UnderBlock[] $underBlocks */
    private $underBlocks;
    
    /** @var Quarry[] $quarries */
    private $quarries;
}


