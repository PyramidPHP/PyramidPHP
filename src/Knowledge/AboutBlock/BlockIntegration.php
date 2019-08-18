<?php

namespace PyramidPHP\Knowledge\AboutBlock;

use PyramidPHP\Block;


class BlockIntegration extends Knowledge
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


