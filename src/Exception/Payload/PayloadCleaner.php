<?php

namespace ByronFichardt\Watcher\Exception\Payload;

class PayloadCleaner
{
     public static function clean(array $payload): array
     {
         $gdprCompliant = config('freeEt4.gdpr.compliant');
         $itemsToClean = [];

         if($gdprCompliant) {
             $itemsToClean = config('freeEt4.gdpr.items');
         }
         collect($payload)->each(function ($value, $key) use (&$payload, $itemsToClean) {
             if(in_array($key, $itemsToClean)) {
                 $payload[$key] = '********';
             }
         });

         return $payload;
     }
}
