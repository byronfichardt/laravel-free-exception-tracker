<?php

namespace ByronFichardt\Watcher;

use ByronFichardt\Watcher\Exception\Exception;
use Illuminate\Support\Facades\Http;

class LaravelTracker
{
    public function report($e): void
    {
        $exception = (new Exception($e))->toArray();
        Http::withHeaders([
            'X-Service-ID' => config('freeEt4.service_id'),
        ])
            ->withToken(config('freeEt4.token'))
            ->acceptJson()
            ->asJson()
            ->baseUrl(config('freeEt4.base_url'))
            ->post('/api/exception', [
                'exception' => $exception,
                'payload' => request()->all(),
                'environment' => env('APP_ENV'),
            ]);
    }
}
