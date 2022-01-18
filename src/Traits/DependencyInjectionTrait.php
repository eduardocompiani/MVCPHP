<?php

namespace App\Traits;

trait DependencyInjectionTrait
{
    private \App\Core\ContainerLoader $container;

    public function __construct()
    {
        $this->container = new \App\Core\ContainerLoader();
    }

    public function getDI(): \App\Core\ContainerLoader
    {
        if (!$this->container) {
            $this->container = new \App\Core\ContainerLoader();
        }

        return $this->container;
    }
}