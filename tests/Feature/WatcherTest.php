<?php

namespace ByronFichardt\Watcher\tests\Feature;

use ByronFichardt\Watcher\LaravelWatcher;
use ByronFichardt\Watcher\tests\TestCase;
use Exception;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;

class WatcherTest extends TestCase
{
    public function testWatcher()
    {
        Http::fake();

        $laravelWatcher = new LaravelWatcher();
        $laravelWatcher->report(new Exception('Test Exception'));

        Http::assertSent(function (Request $request) {
            return $request->hasHeader('X-Service-ID') &&
                $request->url() == 'http://localhost/api/exception' &&
                $request['environment'] == 'testing' &&
                $request['exception']['message'] == 'Test Exception' &&
                $request['payload'] == [];
        });
    }
}
