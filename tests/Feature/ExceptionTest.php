<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\Exception;
use ByronFichardt\Watcher\tests\TestCase;

class ExceptionTest extends TestCase
{
    public function testException()
    {
        $exception = new Exception(new \Exception('Test Exception'));

        $this->assertEquals('Test Exception', $exception->toArray()['message']);
        $this->assertEquals(12, $exception->toArray()['line']);
        $this->assertEquals('Exception', $exception->toArray()['type']);
    }
}
