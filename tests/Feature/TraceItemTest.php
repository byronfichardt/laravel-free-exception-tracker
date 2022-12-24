<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\StackTrace\TraceItem;
use ByronFichardt\Watcher\tests\TestCase;
use Illuminate\Support\Arr;

class TraceItemTest extends TestCase
{
    public function testTraceItem()
    {
        $traceItem = new TraceItem([
            'file' => __FILE__,
            'line' => 12,
            'function' => 'testTraceItem',
        ]);

        $this->assertEquals('TraceItemTest.php', Arr::last(explode('\\', $traceItem->toArray()['file'])));
        $this->assertEquals(12, $traceItem->toArray()['line']);
        $this->assertEquals('testTraceItem', $traceItem->toArray()['method']);
    }

    public function testTraceItemVendor()
    {
        $traceItem = new TraceItem([
            'file' => 'vendor/some/package/src/SomeClass.php',
            'line' => 12,
            'function' => 'testTraceItem',
        ]);

        $this->assertEquals('SomeClass.php',  Arr::last(explode('/', $traceItem->toArray()['file'])));
        $this->assertEquals(12, $traceItem->toArray()['line']);
        $this->assertEquals('testTraceItem', Arr::last(explode('\\', $traceItem->toArray()['method'])));
        $this->assertEquals(true, $traceItem->toArray()['isInternal']);
    }

    public function testTraceItemWithClass()
    {
        $traceItem = new TraceItem([
            'file' => __FILE__,
            'line' => 12,
            'function' => 'testTraceItem',
            'class' => 'ByronFichardt\Watcher\tests\Feature\TraceItemTest',
        ]);

        $this->assertEquals('TraceItemTest.php',  Arr::last(explode('\\', $traceItem->toArray()['file'])));
        $this->assertEquals(12, $traceItem->toArray()['line']);
        $this->assertEquals('testTraceItem', $traceItem->toArray()['method']);
        $this->assertEquals($traceItem->toArray()['code'], json_encode($this->getcode()));
    }

    public function getCode(): array
    {
        return [
            8 => 'class TraceItemTest extends TestCase',
            9 => '{',
            10 => '    public function testTraceItem()',
            11 => '    {',
            12 => '        $traceItem = new TraceItem([',
            13 => '            \'file\' => __FILE__,',
            14 => '            \'line\' => 12,',
            15 => '            \'function\' => \'testTraceItem\','
        ];
    }
}
