<?php

namespace ByronFichardt\Watcher\Exception\Breadcrumb;

class BreadcrumbList
{
    protected array $breadcrumbs;

    public function __construct()
    {
        $this->breadcrumbs = [];
    }

    public function add(array $breadcrumb): void
    {
        $this->breadcrumbs[] = $breadcrumb;
    }

    /**
     * @return array
     */
    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }
}
