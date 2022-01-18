<?php

namespace App\Core;

use App\Enum\HTTPMethod;

class Request
{
    private array $bodyParams;
    private array $urlParams;
    private HTTPMethod $method;

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
        return $this->bodyParams;
    }

    /**
     * @param array $bodyParams
     */
    public function setBodyParams(array $bodyParams): void
    {
        $this->bodyParams = $bodyParams;
    }

    /**
     * @return array
     */
    public function getUrlParams(): array
    {
        return $this->urlParams;
    }

    /**
     * @param array $urlParams
     */
    public function setUrlParams(array $urlParams): void
    {
        $this->urlParams = $urlParams;
    }

    /**
     * @return HTTPMethod
     */
    public function getMethod(): HTTPMethod
    {
        return $this->method;
    }

    /**
     * @param HTTPMethod $method
     */
    public function setMethod(HTTPMethod $method): void
    {
        $this->method = $method;
    }
}