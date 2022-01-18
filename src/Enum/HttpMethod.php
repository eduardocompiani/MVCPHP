<?php

namespace App\Enum;

use App\Exception\MethodNotFound;

enum HTTPMethod {
    case GET;
    case POST;
    case PUT;
    case PATCH;
    case DELETE;

    /**
     * @throws MethodNotFound
     */
    public static function from(string $i): HTTPMethod
    {
        foreach (HTTPMethod::cases() as $HTTPMethod) {
            if ($HTTPMethod->name == strtoupper($i)) {
                return $HTTPMethod;
            }
        }

        throw new MethodNotFound();
    }
}