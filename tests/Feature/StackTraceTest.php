<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\StackTrace\StackTrace;
use ByronFichardt\Watcher\tests\TestCase;
use Illuminate\Support\Arr;

class StackTraceTest extends TestCase
{
    public function testStackTrace()
    {
        $exception = new \Exception('Test Exception');
        $stackTrace = new StackTrace($exception->getTrace());

        $this->assertTrue(is_array($stackTrace->getTrace()));
        $this->assertEquals(Arr::last(explode('/', $stackTrace->getTrace()[0]['file'])), 'TestCase.php');
        $this->assertEquals($stackTrace->getTrace()[0]['method'], 'testStackTrace');
    }
}
