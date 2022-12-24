<?php

namespace ByronFichardt\Watcher\Exception\Breadcrumb;

use Illuminate\Database\Events\QueryExecuted;

class Breadcrumb
{
    protected string $sql;
    protected ?array $bindings = null;
    protected float $time;
    protected ?string $connection;

    public function __construct(QueryExecuted $query)
    {
        $gdprCompliant = config('watcher.gdpr.compliant');
        $this->sql = $query->sql;
        if (! $gdprCompliant) {
            $this->bindings = $query->bindings;
        }
        $this->time = $query->time;
        $this->connection = $query->connectionName;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return $this->sql;
    }

    /**
     * @return array
     */
    public function getBindings(): array
    {
        return $this->bindings;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @return string|null
     */
    public function getConnection(): ?string
    {
        return $this->connection;
    }

    public function toArray(): array
    {
        $data['sql'] = $this->sql;
        if (!config('watcher.gdpr.compliant')) {
            $data['bindings'] = $this->bindings;
        }
        $data['time'] = "{$this->time}ms";
        $data['connection'] = $this->connection;

        return $data;
    }
}
