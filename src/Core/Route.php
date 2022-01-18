<?php

namespace App\Core;

use App\Enum\HTTPMethod;
use App\Interfaces\ControllerInterface;
use App\Interfaces\Middleware;
use App\Interfaces\View;

class Route
{
    private HTTPMethod $HTTPMethod;
    private string $path;
    private ControllerInterface|View $destination;
    private ?string $controllerMethod;
    private ?Middleware $middleware;

    /**
     * @param HTTPMethod $HTTPMethod
     * @param string $path
     * @param ControllerInterface|View $destination
     * @param string|null $controllerMethod
     * @param Middleware|null $middleware
     */
    public function __construct(HTTPMethod $HTTPMethod, string $path, View|ControllerInterface $destination, ?string $controllerMethod = null, ?Middleware $middleware = null)
    {
        $this->HTTPMethod = $HTTPMethod;
        $this->path = $path;
        $this->destination = $destination;
        $this->controllerMethod = $controllerMethod;
        $this->middleware = $middleware;
    }

    public static function createRoute(HTTPMethod $HTTPMethod, string $path, View|ControllerInterface $destination, ?string $controllerMethod = null, ?Middleware $middleware = null): Route
    {
        return new self($HTTPMethod, $path, $destination, $controllerMethod, $middleware);
    }

    public function getPathAsRegex(): string
    {
        $response = preg_replace('/:\w+/', '\w+', $this->getPath());

        return '/^'.preg_replace('/\//', '\\/', $response).'$/';
    }

    /**
     * @return HTTPMethod
     */
    public function getHTTPMethod(): HTTPMethod
    {
        return $this->HTTPMethod;
    }

    /**
     * @param HTTPMethod $HTTPMethod
     */
    public function setHTTPMethod(HTTPMethod $HTTPMethod): void
    {
        $this->HTTPMethod = $HTTPMethod;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return ControllerInterface|View
     */
    public function getDestination(): View|ControllerInterface
    {
        return $this->destination;
    }

    /**
     * @param ControllerInterface|View $destination
     */
    public function setDestination(View|ControllerInterface $destination): void
    {
        $this->destination = $destination;
    }

    /**
     * @return string|null
     */
    public function getControllerMethod(): ?string
    {
        return $this->controllerMethod;
    }

    /**
     * @param string|null $controllerMethod
     */
    public function setControllerMethod(?string $controllerMethod): void
    {
        $this->controllerMethod = $controllerMethod;
    }

    /**
     * @return Middleware|null
     */
    public function getMiddleware(): ?Middleware
    {
        return $this->middleware;
    }

    /**
     * @param Middleware|null $middleware
     */
    public function setMiddleware(?Middleware $middleware): void
    {
        $this->middleware = $middleware;
    }
}