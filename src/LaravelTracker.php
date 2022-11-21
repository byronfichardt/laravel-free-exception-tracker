<?php

namespace ByronFichardt\FreeExceptionTracker;

use Illuminate\Support\Facades\Http;

class LaravelTracker
{
    public function report($e): void
    {
        Http::withHeaders([
            'X-Service-ID' => config('freeEt4.service_id'),
        ])
            ->withToken(config('freeEt4.token'))
            ->acceptJson()
            ->asJson()
            ->baseUrl(config('freeEt4.base_url'))
            ->post('/api/exception', [
                'exception' => [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'trace' => $e->getTrace(),
                    'payload' => request()->all(),
                ],
                'environment' => env('APP_ENV'),
                'headers' => request()->headers->all(),
            ]);
    }
}
