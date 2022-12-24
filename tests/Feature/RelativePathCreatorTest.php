<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\StackTrace\RelativePathCreator;
use ByronFichardt\Watcher\tests\TestCase;

class RelativePathCreatorTest extends TestCase
{
    public function testRelativePathCreator()
    {
        $relativePathCreator = new RelativePathCreator();
        $relativePath = $relativePathCreator->create(__FILE__);
        // this should remain the same as we do not have a base path in the package
        $this->assertEquals(__FILE__, $relativePath);
    }
}
