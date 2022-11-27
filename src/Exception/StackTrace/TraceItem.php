<?php

namespace ByronFichardt\FreeExceptionTracker\Exception\StackTrace;

use Illuminate\Support\Str;

class TraceItem
{
    protected string $code = '';

    protected string $file;

    protected int $line;

    protected string $method;

    protected bool $isInternal;

    public function __construct($traceItem)
    {
        $this->file = RelativePathCreator::create($traceItem['file']);
        $this->line = $traceItem['line'];
        $this->method = $traceItem['function'];
        $this->isInternal = Str::contains($traceItem['file'], 'vendor');

        if (isset($traceItem['class'])) {
            $this->code = CodeExtractor::extract($traceItem['file'], $this->line);
        }
    }

    public function toArray(): array
    {
        return [
            'file' => $this->file,
            'line' => $this->line,
            'method' => $this->method,
            'isInternal' => $this->isInternal,
            'code' => $this->code,
        ];
    }
}
