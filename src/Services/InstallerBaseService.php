<?php

namespace Khokon\Installer\Services;

class InstallerBaseService
{
    protected $result;

    public function setService($service): self
    {
        $this->result = $service;

        return $this;
    }

    public function getService(): self
    {
        $this->result;
    }

    public function __call($method, $arguments)
    {
        return $this->result->{$method}(...$arguments);
    }

}
