<?php

namespace Flat3\Lodata;

use Flat3\Lodata\Interfaces\ServiceEndpointInterface;

class Endpoint implements ServiceEndpointInterface
{
    protected $serviceUri;

    protected $route;

    protected $endpoint;

    public function __construct(string $prefix, string $namespace, string $version)
    {
        $this->serviceUri = str_replace('.', '/', $namespace) . '@' . $version;

        $this->route = $prefix . '/' . $this->serviceUri;

        $this->endpoint = url($this->route) . '/';
    }

    public function serviceUri(): string
    {
        return $this->serviceUri;
    }

    public function endpoint(): string
    {
        return $this->endpoint;
    }

    public function route(): string
    {
        return $this->route;
    }

    public function namespace(): string
    {
        return config('lodata.namespace');
    }

    public function cachedMetadataXMLPath(): ?string
    {
        return null;
    }

    public function discover(Model $model): Model
    {
        return $model;
    }
}