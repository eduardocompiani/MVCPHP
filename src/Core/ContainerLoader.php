<?php

namespace App\Core;

use App\Enum\HTTPMethod;

class ContainerLoader
{
    private array $dependency;

    public function __construct()
    {
        /*
         * Controle de request
         */
        $this->set(Request::class, function () {
            $request = new \App\Core\Request();
            $request->setBodyParams($_REQUEST);
            $request->setUrlParams($_GET);
            $request->setMethod(\App\Enum\HTTPMethod::from($_SERVER['REQUEST_METHOD']));

            return $request;
        });
    }

    public function set(string $path, \Closure $closure)
    {
        $this->dependency[$path] = $closure;
    }

    public function get(string $path)
    {
        return $this->getClosure($path)();
    }

    public function getClosure(string $path): \Closure
    {
        return $this->dependency[$path];
    }

}