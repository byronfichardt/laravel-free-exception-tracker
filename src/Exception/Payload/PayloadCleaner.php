<?php

namespace ByronFichardt\Watcher\Exception\Payload;

class PayloadCleaner
{
     public static function clean(array $payload): array
     {
         $gdprCompliant = config('freeEt4.gdpr.compliant');

         if($gdprCompliant) {
             $itemsToClean = config('freeEt4.gdpr.items');
         }
         return array_map(function($item) use ($itemsToClean) {
             $normalizedItem = strtolower($item);
             if (in_array($normalizedItem, $itemsToClean)) {
                 return '**********';
             }
             return $item;
         }, $payload);
     }
}
