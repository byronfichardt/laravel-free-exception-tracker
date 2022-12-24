<?php

namespace ByronFichardt\Watcher;

use ByronFichardt\Watcher\Exception\Exception;
use ByronFichardt\Watcher\Exception\Payload\PayloadCleaner;
use Illuminate\Support\Facades\Http;

class LaravelWatcher
{
    public function report($e): void
    {
        $exception = (new Exception($e))->toArray();
        $payload = (new PayloadCleaner())->clean(request()->all());

        Http::withHeaders([
            'X-Service-ID' => config('watcher.service_id'),
        ])
            ->withToken(config('watcher.token'))
            ->acceptJson()
            ->asJson()
            ->baseUrl(config('watcher.base_url'))
            ->post('/api/exception', [
                'exception' => $exception,
                'payload' => $payload,
                'environment' => config('app.env'),
            ]);
    }
}
