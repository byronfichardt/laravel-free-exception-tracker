<?php

namespace ByronFichardt\Watcher\Exception\StackTrace;

class CodeExtractor
{
    public static function extract($file, $line): string
    {
        $contents = file_get_contents($file);

        $lines = explode("\n", $contents);

        return json_encode(array_slice($lines, $line - 4, 8, true));
    }
}
