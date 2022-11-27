<?php

namespace ByronFichardt\FreeExceptionTracker\Exception;

use ByronFichardt\FreeExceptionTracker\Exception\StackTrace\CodeExtractor;
use ByronFichardt\FreeExceptionTracker\Exception\StackTrace\RelativePathCreator;
use ByronFichardt\FreeExceptionTracker\Exception\StackTrace\StackTrace;

class Exception
{
    protected int $line;
    protected string $file;
    protected string $message;
    protected int $statusCode;
    protected string $code = '';
    protected array $trace;

    public function __construct($exception)
    {
        $this->line = $exception->getLine();
        $this->file = RelativePathCreator::create($exception->getFile());
        $this->message = $exception->getMessage();
        $this->statusCode = $exception->getCode();
        $this->code = CodeExtractor::extract($exception->getFile(), $this->line);
        $this->trace = (new StackTrace($exception->getTrace()))->getTrace();
    }

    public function toArray(): array
    {
        return [
            'line' => $this->line,
            'file' => $this->file,
            'message' => $this->message,
            'statusCode' => $this->statusCode,
            'code' => $this->code,
            'trace' => $this->trace,
        ];
    }
}
