<?php

namespace ByronFichardt\Watcher\Exception\StackTrace;

class RelativePathCreator
{
    public static function create($file): string
    {
        return str_replace(base_path(), '', $file);
    }
}
