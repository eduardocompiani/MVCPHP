<?php

namespace App\Core;

use App\Traits\DependencyInjectionTrait;

class Router
{
    use DependencyInjectionTrait;

    private string $URI;
    private array $routes;

    public function getMatchingRoute(): ?Route
    {
        /** @var Request $request */
        $request = $this->getDI()->get(Request::class);

        foreach ($this->getRoutes() as $route) {
            /** @var Route $route */
            if (preg_match($route->getPathAsRegex(), $this->getURIWithoutParams())
                && $route->getHTTPMethod() == $request->getMethod()
            ) {
                return $route;
            }
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function getURI(): string
    {
        return $this->URI;
    }

    public function getURIWithoutParams(): string
    {
        return explode('?', $this->getURI())[0];
    }

    /**
     * @param mixed $URI
     */
    public function setURI(string $URI): void
    {
        $this->URI = $URI;
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function addRoute(Route $route): void
    {
        $this->routes[] = $route;
    }
}