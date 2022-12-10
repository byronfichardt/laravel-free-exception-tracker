<?php

namespace ByronFichardt\Watcher\Exception\StackTrace;

class StackTrace
{
    protected array $trace;

    public function __construct($trace)
    {
        foreach ($trace as $traceItem) {
            $this->trace[] = (new TraceItem($traceItem))->toArray();
        }
    }

    public function getTrace(): array
    {
        return $this->trace;
    }
}
