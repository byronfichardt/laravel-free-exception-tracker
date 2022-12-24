<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\Payload\PayloadCleaner;
use ByronFichardt\Watcher\tests\TestCase;

class PayloadCleanerTest extends TestCase
{
    public function testItCleansPayload()
    {
        $payload = [
            'foo' => 'bar',
            'bar' => 'foo',
            'password' => 'baz',
        ];

        $cleanedPayload = [
            'foo' => 'bar',
            'bar' => 'foo',
            'password' => '********',
        ];

        $this->assertEquals($cleanedPayload, (new PayloadCleaner)->clean($payload));
    }

    public function testItCleanNestedItemsInPayload()
    {
        $payload = [
            'foo' => 'bar',
            'bar' => 'foo',
            'user' => [
                'password' => 'baz',
            ]
        ];

        $cleanedPayload = [
            'foo' => 'bar',
            'bar' => 'foo',
            'user' => [
                'password' => '********',
            ]
        ];

        $this->assertEquals($cleanedPayload, (new PayloadCleaner)->clean($payload));
    }
}
