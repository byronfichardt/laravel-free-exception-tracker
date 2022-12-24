<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\StackTrace\CodeExtractor;
use ByronFichardt\Watcher\tests\TestCase;

class CodeExtractorTest extends TestCase
{
    public function testCodeExtractor()
    {
        $codeExtractor = new CodeExtractor();
        $code = $codeExtractor->extract(__FILE__, 12);
        $this->assertEquals(json_encode($this->getCode()), $code);
    }

    public function getCode(): array
    {
        return [
            8 => '{',
            9 => '    public function testCodeExtractor()',
            10 => '    {',
            11 => '        $codeExtractor = new CodeExtractor();',
            12 => '        $code = $codeExtractor->extract(__FILE__, 12);',
            13 => '        $this->assertEquals(json_encode($this->getCode()), $code);',
            14 => '    }',
            15 => '',
        ];
    }
}
