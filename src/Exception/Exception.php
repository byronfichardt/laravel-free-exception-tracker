<?php

namespace ByronFichardt\Watcher\Exception;

use ByronFichardt\Watcher\Exception\StackTrace\CodeExtractor;
use ByronFichardt\Watcher\Exception\StackTrace\RelativePathCreator;
use ByronFichardt\Watcher\Exception\StackTrace\StackTrace;
use JetBrains\PhpStorm\NoReturn;
use Throwable;

class Exception
{
    protected int $line;
    protected string $file;
    protected string $message;
    protected int $statusCode;
    protected string $code = '';
    protected array $trace;
    protected array $server;
    protected string $type;
    protected array $headers;

    #[NoReturn] public function __construct(Throwable $exception)
    {
        $this->line = $exception->getLine();
        $this->file = RelativePathCreator::create($exception->getFile());
        $this->message = $exception->getMessage();
        $this->statusCode = $exception->getCode();
        $this->code = CodeExtractor::extract($exception->getFile(), $this->line);
        $this->trace = (new StackTrace($exception->getTrace()))->getTrace();
        $this->server = array_merge(request()->server->all(), ['REMOTE_ADDR' => '1.1.1.1']);
        $this->headers = getallheaders();
        $this->type = get_class($exception);
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
            'server' => $this->server,
            'headers' => $this->headers,
            'type' => $this->type,
        ];
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }
}
