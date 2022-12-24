<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\Exception\Breadcrumb\Breadcrumb;
use ByronFichardt\Watcher\tests\TestCase;
use Illuminate\Database\Connection;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Config;

class BreadcrumbTest extends TestCase
{
    public function testBreadcrumb()
    {
        $connection = $this->createMock(Connection::class);
        $query = new QueryExecuted('select * from users', [], 1, $connection);
        $breadcrumb = new Breadcrumb($query);
        $this->assertEquals('select * from users', $breadcrumb->getSql());
        $this->assertEquals(1, $breadcrumb->getTime());
        $this->assertEquals([
            'sql' => 'select * from users',
            'time' => '1ms',
            'connection' => null
        ], $breadcrumb->toArray());
    }

    public function testBreadcrumbWithBindings()
    {
        config(['watcher.gdpr.compliant' => false]);
        $connection = $this->createMock(Connection::class);
        $query = new QueryExecuted('select * from users where id in (?,?,?)', [1,2,3], 1, $connection);
        $breadcrumb = new Breadcrumb($query);
        $this->assertEquals('select * from users where id in (?,?,?)', $breadcrumb->getSql());
        $this->assertEquals([1,2,3], $breadcrumb->getBindings());
        $this->assertEquals(1, $breadcrumb->getTime());
        $this->assertEquals([
            'sql' => 'select * from users where id in (?,?,?)',
            'bindings' => [1,2,3],
            'time' => '1ms',
            'connection' => null
        ], $breadcrumb->toArray());
    }
}
