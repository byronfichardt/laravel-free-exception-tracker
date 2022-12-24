<?php

namespace ByronFichardt\Watcher\Exception\Payload;

class PayloadCleaner
{
    protected array $itemsToClean = [];

    public function __construct()
    {
        $gdprCompliant = config('watcher.gdpr.compliant');

        if($gdprCompliant) {
            $this->itemsToClean = config('watcher.gdpr.items', []);
        }
    }

    public function clean(array $payload): array
    {
        array_walk_recursive($payload, function (&$item, $key)
        {
            if(in_array($key, $this->itemsToClean)) {
                $item = '********';
            }

            return $item;
        });

        return $payload;
    }
}
